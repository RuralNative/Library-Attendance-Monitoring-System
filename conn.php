<?php
	//Variables for Database Connection
	$hostname = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'attendance';

	//Initialize Database Connection
	$conn = new mysqli($hostname, $user, $password, $database);

	//Handle DB Connection Error
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>