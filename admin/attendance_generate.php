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

    // Set Content for PDF using TCPDF 
	require_once('../TCPDF-main/tcpdf.php');  
    
    /*
        - PDF Generation
        - Constructor Parameters are as follows:
        - Portrait/Landscape
        - Measurement Unit (Inch/Millimeter)
        - Page Format (A4/Legal/Letter)
        - Enabling of TCPDF Methods for HTML/CSS
        - Enabling of TCPDF Methods for JS
    */ 
    $pdf = new TCPDF('P', 
                    PDF_UNIT, 
                    PDF_PAGE_FORMAT, 
                    true, 
                    'UTF-8', 
                    false);  

    // Set PDF Creator as defined in the TCPDF Library
    $pdf->SetCreator(PDF_CREATOR);  

    // Set PDF Title
    $pdf->SetTitle('CPSU - Moises Padilla Library Attendance Report: '.$from_title.' - '.$to_title);  

    // Set Content Title (Logo, Logo Title, Title, and PDF_HEADER_STRING constant)
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  

    // Set Header Font (Font Name, Font Style, Font Size)
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  

    // Set Footer Font (Font Name, Font Style, Font Size)
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
    
    // Set Default Monospaced Font
    $pdf->SetDefaultMonospacedFont('helvetica');  

    // Set Footer Margin
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  

    // Set Content Margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  

    // Determine if Header is to be Printed
    $pdf->setPrintHeader(false);  

    // Determine if Footer is to be Printed
    $pdf->setPrintFooter(false); 

    // Set Automated Page Break
    $pdf->SetAutoPageBreak(TRUE, 10);  

    // Set Content Font (Font Name, Font Style, Font Size)
    $pdf->SetFont('helvetica', '', 11);  

    // Adds New Page for Content to be Printed At
    $pdf->AddPage();  

    //Determine Content of PDF
    $content = '';  
    $content .= '
      	<h2 align="center" style="color: #096901;">
            CENTRAL PHILIPPINES STATE UNIVERSITY
        </h2>
        <h2 align="center" style="color: #096901;">
            MOISES PADILLA CAMPUS
        </h2>
        <h3 align="center">Campus Library Attendance Report</h3>
      	<h4 align="center" style="color: #414441;">
            '.$from_title." - ".$to_title.'
        </h4>

      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
				  <th width="15%"><b>Date</b></th>
                  <th width="30%"><b>Full Name</b></th>
                  <th width="25%"><b>Students ID</b></th>
                  <th width="15%"><b>Time In</b></th>
                  <th width="15%"><b>Time Out</b></th>
           </tr>  
      ';  
    $content .= generateRow($fromDate, $toDate, $conn);  
    $content .= '</table>';  
    $pdf->writeHTML($content);
    $pdf->Output('CPSU - Moises Padilla Library Attendance Report: '.$from_title.' - '.$to_title.'.pdf',
                'D'); 
?>