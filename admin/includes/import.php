<?php
// Handles the bulk importation of student information to our student records table of our database
if (isset($_POST['submit'])) {
	
	//Initialize connection to database
	include 'includes/conn.php';
	
	//Show file name/content upon successful upload
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." Uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['filename']['tmp_name']);
	}

	//PRIMARY code block for CSV Reader initialization and storing fetched data of specific columns to database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	while (($data = fgetcsv($handle, 5000, ",")) !== FALSE) {
		$reference_number = $data[0];
		$fullname = $data[1];
		$residence = $data[2];
		$programme = $data[3];
		
		//SQL Query for storing data to database
		$conn -> query(
			"INSERT INTO students (
				reference_number, 
				firstname,
				residence, 
				programme, 
				created_on
			) VALUES (
				'$reference_number', 
				'$fullname', 
				'$residence', 
				'$programme', 
				NOW()
			)"
		);
	}

	// Closes CSV Reader
	fclose($handle);

	// Show success message and redirects to relevant page
	echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
	echo "<script>document.location='employee.php'</script>";
}
?>