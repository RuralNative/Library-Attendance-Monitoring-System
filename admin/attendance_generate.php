<?php
    // PHP Script for Generating Reports
	include 'includes/session.php';

    /*
        - PHP Funtion Data Row Generation
        - $fromDate refers to starting date
        - $toDate refers to ending date
        - $connection refers to our database connection
    */  
	function generateRow($fromDate, $toDate, $connection){
		// Variable to Hold Student Data
        $contents = '';
	 	
	 	// Query for Fetching Student Data
		$sql = "SELECT *, 
                students.reference_number AS empid, 
                attendance.id AS attid 
                FROM attendance 
                LEFT JOIN students 
                ON students.id=attendance.reference_number 
                WHERE date BETWEEN '$fromDate' AND '$toDate' 
                GROUP BY attendance.reference_number 
                ORDER BY attendance.date ASC, 
                attendance.time_in ASC";
		$query = $connection->query($sql);

        $total = 0;

        // Print Data as long as Query contains Result
		while($row = $query->fetch_assoc()){
			$empid = $row['empid'];
           
			$contents .= '
			<tr>
				<td>'.date('M d, Y', strtotime($row['date'])).'</td>
                <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                <td>'.$row['empid'].'</td>
                <td>NULL</td>
                <td>NULL</td>
                <td>'.date('h:i A', strtotime($row['time_in'])).'</td>
                <td>'.date('h:i A', strtotime($row['time_out'])).'</td>
			</tr>
			';
		}
		return $contents;
	}
		
    // Determine Values for Time-Related Variables
	$range = $_POST['date_range'];
	$ex = explode(' - ', $range);
	$fromDate = date('Y-m-d', strtotime($ex[0]));
	$toDate = date('Y-m-d', strtotime($ex[1]));

    // Determine Range Sub Header
	$from_title = date('M d, Y', strtotime($ex[0]));
	$to_title = date('M d, Y', strtotime($ex[1]));

	require_once('../TCPDF-main/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('SIA Library Attendance: '.$from_title.' - '.$to_title);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">SIA Library Attendance Sheet</h2>
      	<h4 align="center">'.$from_title." - ".$to_title.'</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
				  <th width="15%"><b>Date</b></th>
                  <th width="25%"><b>Full Name</b></th>
                  <th width="15%"><b>Students ID</b></th>
                  <th width="12%"><b>PURPOSE</b></th>
                  <th width="10%"><b>GRADE</b></th>
                  <th width="12%"><b>Time In</b></th>
                  <th width="12%"><b>Time Out</b></th>
           </tr>  
      ';  
    $content .= generateRow($fromDate, $toDate, $conn);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('attendance.pdf', 'I');

?>