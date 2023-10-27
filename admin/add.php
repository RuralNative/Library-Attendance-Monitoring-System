<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$reference_number = $_POST['reference_number'];
		$firstname = $_POST['firstname'];
		$residence = $_POST['residence'];
		$programme = $_POST['programme'];
		$sql = "INSERT INTO students (reference_number, firstname, residence, programme) VALUES ('$reference_number', '$firstname', '$residence', '$programme')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: 1index.php');
?>