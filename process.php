<?php
include('connection.php');

$palatandaan =  $_GET['palatandaan'];



if($palatandaan =="edit"){
	$id=$_GET['forIpinasa'];
	$querySaDatabase = "SELECT * FROM subjecttbl WHERE subjectid='$id' ";
	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['sname'] = $row['subjectname'];
			$pambato['sdesc'] = $row['subjectdesc'];
		}
		echo json_encode($pambato);
}

if($palatandaan=="update"){
		
			$sn = $_GET['subname'];
			$sd = $_GET['subdes'];
			$uId = $_GET['uId'];

			
			$q = "UPDATE subjecttbl SET subjectname='$sn', subjectdesc='$sd', WHERE subjectid='$uId' ";
			$u = mysqli_query($con , $q);
			if($u){
				echo "$sn EDITED successfully";
			}
}	

?>