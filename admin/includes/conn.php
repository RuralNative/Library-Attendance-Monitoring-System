<?php
	//SQL Variables for Database Connection
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'attendance';
	
	//Function for Database Connection
	$conn = new mysqli($hostname, $username, $password, $database);

	//Error Message upon Database Connection Failure
	if ($conn->connect_error) {
	    //Kill Script and Show Error Message
		die("Connection failed: " . $conn->connect_error);
	}	
?>