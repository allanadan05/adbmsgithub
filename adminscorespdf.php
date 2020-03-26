<?php
// error reporting to bypass undefined varialble to force without permission siya still working in depends sa condition
error_reporting(1);
require 'fpdf182/fpdf.php';
include 'connection.php';
include 'adminsession.php';
$pdf = new FPDF();

if($_SESSION['access']=="admin"){

}else{
    header("Location: index.php?login=access");
    exit();
}



$pdf->AddPage();
$pdf->SetFont('Arial','U',15);
$pdf->Cell(180,5,'Quiz Records',0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(58,5,'Name',1,0);
$pdf->Cell(47,5,'Quiz Title',1,0);
$pdf->Cell(13,5,'Score',1,0);
$pdf->Cell(34,5,'Average Score',1,0);
$pdf->Cell(33,5,'Remarks',1,0);
$pdf->Ln();
//database

$sql="select (select concat(lname, ', ', fname) as name from userstbl 
where userid=scoretbl.userid) as user, 
(SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname,
 concat(totalscore, '/', totalitems) as score, 
 averagescore, remarks from scoretbl ORDER BY user";
 $query=mysqli_query($con,$sql);
 while($result=mysqli_fetch_array($query))
 {
     $pdf->SetFont('Arial','',9);
     $pdf->Cell(58,5,$result['user'],1,0);
     $pdf->Cell(47,5,$result['quizname'],1,0);
     $pdf->Cell(13,5,$result['score'],1,0);
     $pdf->Cell(34,5,$result['averagescore'],1,0);
     if($result['remarks']>=75.00)
     {
         $remarks="PASSED";
     }
     else
     {
         if($result['remarks']<=0){
             $remarks="Undefined";
          }else{
             $remarks="FAILED";
          }
     }

     $pdf->Cell(33,5,$result['remarks'],1,0);
     $pdf->Ln();
 }

$pdf->Output();

?>