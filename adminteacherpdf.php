<?php

if($_SESSION['access']=="admin"){

}else{
    header("Location: index.php?login=access");
    exit();
}

// error reporting to bypass undefined varialble to force without permission siya still working in depends sa condition
error_reporting(1);
require 'fpdf182/fpdf.php';
include 'connection.php';
include 'adminsession.php';
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial','U',15);
$pdf->Cell(180,5,'Teacher Records',0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,5,'Full Name',1,0);
$pdf->Cell(55,5,'Email',1,0);
$pdf->Cell(30,5,'Department',1,0);
$pdf->Cell(42,5,'Subject Enroll',1,0);
$pdf->Ln();
//database


$sql="select teachersid, concat(lname, ', ', fname , ' ', mname) AS name, email, 
(SELECT departmentname from departmenttbl WHERE deptid=teacherstbl.deptid) AS departmentname, 
(SELECT count(subjectid) from teachersubjecttbl where teachersid=teacherstbl.teachersid) AS NoOfSubject 
FROM teacherstbl order by teacherstbl.lname";
$query=mysqli_query($con,$sql);
while($result=mysqli_fetch_array($query))
{
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(55,5,$result['name'],1,0);
	$pdf->Cell(55,5,$result['email'],1,0);
	$pdf->Cell(30,5,$result['departmentname'],1,0);
	$pdf->Cell(42,5,$result['NoOfSubject'],1,0);
	$pdf->Ln();
}
$pdf->Output();

?>