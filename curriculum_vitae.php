<?php
session_start();
require('fpdf.php');
require("includes/connect.inc.php");

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM users WHERE username='$user'");
$row = $query->fetch_array();

class PDF extends FPDF
{
	function Header()
	{
		// Arial bold 15
		// Move to the right
		$this->Cell(80);
		// Title
		
		
		
	}
}
$pdf = new PDF('P','mm','A4');


	$pdf->AddPage();
	
	$pdf->setFont('times','B',25);
	$pdf->Cell(30,10,'Curriculum Vitae',0,0,'C');
	
	$pdf->SetFont('times','B',18);
	
	$pdf->Ln();
	$pdf->Ln(10);
	$pdf->Cell(40, 6, 'Personal Data:', 0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(6, 8, 'a. ', 0);
	$pdf->Cell(80, 8, 'Name: ', 0);
	$pdf->Cell(0, 8, $row['fullname'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'b. ', 0);
	$pdf->Cell(80, 8, 'Date of Birth: ', 0);
	$pdf->Cell(0, 8, $row['dob_day']." ".$row['dob_month'].", ".$row['dob_year'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'c. ', 0);
	$pdf->Cell(80, 8, 'Phone Number: ', 0);
	$pdf->Cell(0, 8, $row['phone'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'd. ', 0);
	$pdf->Cell(80, 8, 'Email: ', 0);
	$pdf->Cell(0, 8, $row['email'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'e. ', 0);
	$pdf->Cell(80, 8, 'Marital Status: ', 0);
	$pdf->Cell(0, 8, $row['maritalStatus'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'f. ', 0);
	$pdf->Cell(80, 8, 'Home Address: ', 0);
	$pdf->Cell(0, 8, $row['homeAddress'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'g. ', 0);
	$pdf->Cell(80, 8, 'Place of Birth: ', 0);
	$pdf->Cell(0, 8, $row['placeOfBirth'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'h. ', 0);
	$pdf->Cell(80, 8, 'Nationality: ', 0);
	$pdf->Cell(0, 8, $row['nationality'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'i. ', 0);
	$pdf->Cell(80, 8, 'State: ', 0);
	$pdf->Cell(0, 8, $row['state'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'j. ', 0);
	$pdf->Cell(80, 8, 'Local Government: ', 0);
	$pdf->Cell(0, 8, $row['localGovernment'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'k. ', 0);
	$pdf->Cell(80, 8, 'Languages Spoken: ', 0);
	$pdf->Cell(0, 8, $row['languages'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'l. ', 0);
	$pdf->Cell(80, 8, 'Next of Kin: ', 0);
	$pdf->Cell(0, 8, $row['nextOfKin'], 0);
	$pdf->Ln();
	$pdf->Cell(6, 8, 'm. ', 0);
	$pdf->Cell(80, 8, 'Next of Kin Address: ', 0);
	$pdf->Cell(0, 8, $row['nextOfKinAddress'], 0);
	$pdf->Ln();
	$pdf->Ln();
	
	
	if($db->query("SELECT * FROM institutions WHERE user='$user'")->num_rows != 0)
	{
		$pdf->SetFont('times','B',18);
		$pdf->Cell(40, 6, 'Institutions Attended with Date and Certificate Obtained:', 0);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','',14);
		
		$ins_query = $db->query("SELECT * FROM institutions WHERE user='$user' ORDER BY id DESC");
		$i = 'a';
		while($ins_row = $ins_query->fetch_array()){
			$pdf->Cell(6, 8, $i.". ", 0);
			//$pdf->Cell(80, 8, $ins_row['institutionName'].", ".$ins_row['fromD']." - ".$ins_row['toD'].", ".$ins_row['certificate'], 0);
			$pdf->Write(8,$ins_row['institutionName'].", ".$ins_row['fromD']." - ".$ins_row['toD'].", ".$ins_row['certificate']);
			$pdf->Ln();
			$i++;
		}
	}
	
	if($db->query("SELECT * FROM work WHERE user='$user'")->num_rows != 0)
	{
		$pdf->Ln();
		$pdf->SetFont('times','B',18);
		$pdf->Cell(40, 6, 'Work Experience:', 0); 
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','',14);
		
		$wrk_query = $db->query("SELECT * FROM work WHERE user='$user' ORDER BY id DESC");
		$i = 'a';
		while($wrk_row = $wrk_query->fetch_array()){
			$pdf->Cell(6, 8, $i.". ", 0);
			//$pdf->Cell(80, 8, $ins_row['institutionName'].", ".$ins_row['fromD']." - ".$ins_row['toD'].", ".$ins_row['certificate'], 0);
			$pdf->Write(8,$wrk_row['position']." - ".$wrk_row['placeOfWork'].", ".$wrk_row['fromD']." - ".$wrk_row['toD']);
			$pdf->Ln();
			$i++;
		}
	}
	
	if($db->query("SELECT * FROM publications WHERE user='$user'")->num_rows != 0)
	{
		$pdf->Ln();
		$pdf->SetFont('times','B',18);
		$pdf->Cell(40, 6, 'Publications:', 0); 
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','',14);
		
		$pub_query = $db->query("SELECT * FROM publications WHERE user='$user' ORDER BY id DESC");
		$i = 'a';
		while($pub_row = $pub_query->fetch_array()){
			$pdf->Cell(6, 8, $i.". ", 0);
			//$pdf->Cell(80, 8, $ins_row['institutionName'].", ".$ins_row['fromD']." - ".$ins_row['toD'].", ".$ins_row['certificate'], 0);
			$pdf->Write(8,$pub_row['publication']);
			$pdf->Ln();
			$i++;
		}
	}
	
	if($db->query("SELECT * FROM associations WHERE user='$user'")->num_rows != 0)
	{
		$pdf->Ln();
		$pdf->SetFont('times','B',18);
		$pdf->Cell(40, 6, 'Membership of Professional Associatons:', 0); 
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','',14);
		
		$asc_query = $db->query("SELECT * FROM associations WHERE user='$user' ORDER BY id DESC");
		$i = 'a';
		while($asc_row = $asc_query->fetch_array()){
			$pdf->Cell(6, 8, $i.". ", 0);
			//$pdf->Cell(80, 8, $ins_row['institutionName'].", ".$ins_row['fromD']." - ".$ins_row['toD'].", ".$ins_row['certificate'], 0);
			$pdf->Write(8,$asc_row['rank'].", ".$asc_row['association']);
			$pdf->Ln();
			$i++;
		}
	}
	
	if(!empty($row['hobbies'])){
		$pdf->SetFont('times','B',18);
		$pdf->Ln();
		$pdf->Cell(40, 6, 'Hobbies: ', 0);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(0, 8, $row['hobbies'], 0);
		$pdf->Ln();
	}

	$pdf->Output();
?>