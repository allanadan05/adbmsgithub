<?php
include('connection.php');

$palatandaan =  $_GET['palatandaan'];



if($palatandaan =="edit"){
	$id=$_GET['forIpinasa'];
	$querySaDatabase = "SELECT * FROM lessontbl WHERE lessonid='$id' ";
	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['lessontitle'] = $row['lessontitle'];
			$pambato['lessondetail'] = $row['lessondetail'];
			$pambato['lessonpdf'] = $row['lessonpdf'];
		}
		echo json_encode($pambato);
}

if($palatandaan=="update"){
		
			$sn = $_GET['lessontitle'];
			$sd = $_GET['lessondetail'];
			$pdf = $_GET['lessonpdf']['name'];
			$uId = $_GET['uId'];

			
			$q = "UPDATE lessontbl SET lessontitle='$sn',lessonpdf='$pdf', lessondetail='$sd', WHERE subjectid='$uId' ";
			$u = mysqli_query($con , $q);
			if($u){
				echo "$sn EDITED successfully";
			}
}	

?>