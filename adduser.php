<?php
include('connection.php');

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






?>
 