<?php
	// DO NOT MODIFY (START)
	session_start();
	include_once('connection.php');
	// DO NOT MODIFY (END)

	// RUN upon SUBMISSION
	if(isset($_POST['add'])){
		// VARIABLES for QUERY
		$reference_number = $_POST['reference_number'];
		$firstname = $_POST['firstname'];
		$residence = $_POST['residence'];
		$programme = $_POST['programme'];

		// QUERY for ADD Operation
		$sql = "INSERT INTO students (reference_number, firstname, residence, programme) VALUES ('$reference_number', '$firstname', '$residence', '$programme')";

		// Provide accessible MESSAGES for operation result
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		} else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	} else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	//REDIRECT to STUDENT PAGE upon SUBMISSION
	header('location: 1index.php');
?>