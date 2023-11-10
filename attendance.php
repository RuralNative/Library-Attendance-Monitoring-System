<?php
	//SUBMISSION OPERATION SCRIPT
	if(isset($_POST['student_id'])){
		
		// Default Value for Message Output
		$output = array('error'=>false);

		// Scripts for Database Connection and Timezone 
		include 'conn.php';
		include 'timezone.php';

		// Variables for Data Storage
		$student_id = $_POST['student_id'];
		$status = $_POST['status'];

		// Query for Fetching Data
		$sql = "SELECT * FROM students 
				WHERE reference_number = '$student_id'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$id = $row['id'];
			$date_now = date('Y-m-d');

			// TIMED IN Operation
			if($status == 'in'){
			
				$sql = "SELECT * FROM attendance 
						WHERE reference_number = '$id' 
						AND date = '$date_now' 
						AND time_in IS NOT NULL 
						AND status = 0";
				$query = $conn->query($sql);

				if ($query->num_rows > 0) {
					// Code Block for CHECK-IN Operation with 'TIMED IN' Status
					$output['error'] = true;
					$output['message'] = 'You have timed in for today';
				} else {
					// Code Block for CHECK-IN Operation with No 'TIMED IN' Status
					$logstatus = 0;
					$sql = "INSERT INTO attendance 
							(reference_number, date, time_in, status) 
							VALUES ('$id', '$date_now', NOW(), '$logstatus')";
					if($conn->query($sql)){
						$output['message'] = 'Time in: '.$row['firstname'].' '.$row['lastname'];
					}
					else{
						$output['error'] = true;
						$output['message'] = $conn->error;
					}
				}
			} else {
				// TIMED OUT Operation
				$sql = "SELECT *, 
						attendance.id AS uid 
						FROM attendance 
						LEFT JOIN students 
						ON students.id=attendance.reference_number
						WHERE attendance.reference_number = '$id' 
						AND date = '$date_now' 
						AND status = 0";
				$query = $conn->query($sql);

				if ($query->num_rows < 1) {
					// Code Block for CHECK-IN Operation with 'TIMED OUT' Status (Scenario 1)
					$output['error'] = true;
					$output['message'] = 'Cannot Timeout. No time in.';
				} else {
					$row = $query->fetch_assoc();
					if($row['time_out'] != '00:00:00'){
						// Code Block for CHECK-IN Operation with 'TIMED OUT' Status (Scenario 2)
						$output['error'] = true;
						$output['message'] = 'You have timed out for today';
					} else {
						// DO NOT MODIFY (START)
						$sql = "UPDATE attendance SET time_out = NOW(), status = 1 WHERE id = '".$row['uid']."'";
						if ($conn->query($sql)) {
							$output['message'] = 'Time out: '.$row['firstname'].' '.$row['lastname'];

							$sql = "SELECT * FROM attendance WHERE id = '".$row['uid']."'";
							$query = $conn->query($sql);
							$urow = $query->fetch_assoc();

							$time_in = $urow['time_in'];
							$time_out = $urow['time_out'];

							$time_in = new DateTime($time_in);
							$time_out = new DateTime($time_out);
							$interval = $time_in->diff($time_out);
							$hrs = $interval->format('%h');
							$mins = $interval->format('%i');
							$mins = $mins/60;
							$int = $hrs + $mins;
							if($int > 4) {
								$int = $int - 1;
							}
							$sql = "UPDATE attendance SET num_hr = '$int' WHERE id = '".$row['uid']."'";
							$conn->query($sql);
						} else {
							$output['error'] = true;
							$output['message'] = $conn->error;
						}
						// DO NOT MODIFY (END)
					}
				}
			}
		} else {
			// Code Block for Operations in relation to INVALID REF. NUMBER
			$output['error'] = true;
			$output['message'] = 'Reference Number not found';
		}
	}
	
	// SEND JSON Data for Index PHP use
	echo json_encode($output);
?>