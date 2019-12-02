<?php
include('connection.php');

if(isset($_POST['addstudentsubmit'])){
	$email=$_POST['email'];
	$pword=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mname=$_POST['mname'];
	$sectionid=$_POST['sectionid'];

	$sql = "INSERT INTO userstbl(email,password,fname,lname,mname,sectionid) VALUES ('$email','$pword','$fname','$lname','$mname','$sectionid')";
	if(mysqli_query($con,$sql))
	    {
	        header("location: adminstudents.php");
	    }
	    else
	    {
	        echo " SIGN UP FAILED ";
	    }

}

if(isset($_POST['editstudentsubmit'])){
    $id=$_POST['hiddenuserid'];
	$email=$_POST['email'];
	$pword=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mname=$_POST['mname'];
	$sectionid=$_POST['sectionid'];

	$sql = "UPDATE userstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',sectionid='$sectionid' WHERE userid='$id' ";
	if(mysqli_query($con,$sql))
	    {
	        header("location: adminstudents.php?editstudentresult=success&lname=".$lname."&fname=".$fname);
	    }
	    else
	    {
	        header("location: adminstudents.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
	    }
}



?>
 