<?php
include('connection.php');

$email=$_POST['email'];
$pword=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$deptid=$_POST['deptid'];




$sql = "INSERT INTO teacherstbl(email,password,fname,lname,mname,deptid) VALUES ('$email','$pword','$fname','$lname','$mname','$deptid')";
if(mysqli_query($con,$sql))
    {
        header("location: adminteachers.php");
    }
    else
    {
        echo " SIGN UP FAILED ";
    }






?>