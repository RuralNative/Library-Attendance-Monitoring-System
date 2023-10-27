<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$reference_number = $_POST['reference_number'];
		$firstname = $_POST['firstname'];
		$residence = $_POST['residence'];
		$programme = $_POST['programme'];
		$email = $_POST['email'];
		$sql = "UPDATE students SET reference_number = '$reference_number', firstname = '$firstname', residence = '$residence', programme = '$programme', email = '$email' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: 1index.php');

?>