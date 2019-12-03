<?php
include('connection.php');
if(isset($_GET['palatandaan'])){
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




//edit teachers
if($palatandaan =="editsteacher"){
	$id=$_GET['forwardedid'];
	$querySaDatabase = "SELECT * FROM teacherstbl WHERE teachersid='$id' ";
	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['teachersid'] = $row['teachersid'];
			$pambato['email'] = $row['email'];
			$pambato['password'] = $row['password'];
			$pambato['fname'] = $row['fname'];
			$pambato['lname'] = $row['lname'];
			$deptid=$row['deptid'];
			$qq = "SELECT * FROM departmenttbl WHERE deptid='$deptid' ";
			$ee = mysqli_query($con, $qq);
			while ($rr = mysqli_fetch_array($ee)){
			$pambato['departmentname'] = $rr['departmentname'] ;
			$pambato['deptid'] = $rr['deptid'];
			}
			

		}
		echo json_encode($pambato);
}

}
?>