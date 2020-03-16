<?php
// error reporting to bypass undefined varialble to force without permission siya still working in depends sa condition
error_reporting(1);
require 'fpdf182/fpdf.php';
include 'connection.php';
include 'adminsession.php';
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial','U',15);
$pdf->Cell(180,5,'Student Records',0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(48,5,'Full Name',1,0);
$pdf->Cell(48,5,'Email',1,0);
$pdf->Cell(15,5,'Section',1,0);
$pdf->Cell(32,5,'Subject',1,0);
$pdf->Cell(32,5,'Average Score',1,0);
$pdf->Ln();
//database

//$sql="SELECT userstbl.lname,userstbl.fname,userstbl.email,userstbl.sectionid,scoretbl.quizid, scoretbl.averagescore,scoretbl.remarks FROM userstbl,scoretbl WHERE userstbl.userid=scoretbl.userid";
$sql="select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email, 
(select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname,
 (select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore
  from userstbl order by userstbl.lname";
$query=mysqli_query($con,$sql);
while($result=mysqli_fetch_array($query))
{
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(48,5,$result['lname'].", ".$result['fname'],1,0);
	$pdf->Cell(48,5,$result['email'],1,0);
	$pdf->Cell(15,5,$result['sectionname'],1,0);
	$q="select subjectid, (select subjectname from subjecttbl where subjectid=sectionsubjecttbl.subjectid) AS subjectname from sectionsubjecttbl where sectionid=" .$result['sectionid'];	
	$querySubject=mysqli_query($con,$q);
	$foundSubject=mysqli_fetch_array($querySubject);
	$pdf->Cell(32,5,$foundSubject['subjectname'],1,0);
	if($result['averagescore']>=75.00)
	{
		$remarks=" PASSED";
	}
	else
	{
		if($result['averagescore']<=0){
			$remarks="Undefined";
		 }else{
			$remarks="FAILED";
		 }
	}
	$pdf->Cell(32,5,$result['averagescore'].$remarks,1,0); 
	/*
	//section id
	$foundSection=$result['sectionid'];
	$section="SELECT * FROM sectiontbl WHERE sectionid=$foundSection";
	$querySection=mysqli_query($con,$section);
	$compareSection=mysqli_fetch_array($querySection);
	if($compareSection['sectionname']==$foundSection);
	$pdf->Cell(15,5,$compareSection['sectionname'],1,0);
	//quiz id
	$foundQuiz=$result['quizid'];
	$quiz="SELECT * FROM quiztbl WHERE quizid=$foundQuiz";
	$queryQuiz=mysqli_query($con,$quiz);
	$compareQuiz=mysqli_fetch_array($queryQuiz);
	if($compareQuiz['quizid']==$foundQuiz);
	$pdf->Cell(48,5,$compareQuiz['quizname'],1,0);
	
	$pdf->Cell(27,5,$result['averagescore']."%".$result['remarks'],1,0); 
	*/
	$pdf->Ln();
}
$pdf->Output();

?>