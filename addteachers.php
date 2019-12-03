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
        $sectionid=$_POST['section'];
        $subjectid=$_POST['subject'];
        $sql="INSERT INTO sectionsubjecttbl(sectionid,subjectid) VALUES ('$sectionid','$subjectid')";
        $Excutequery=mysqli_query($con,$sql);
        if($Excutequery){
        $subjectid=$_POST['subject'];
        
        header("location: adminteachers.php?addsubresult=success");
        }
    }
        
    
    else
    {
        echo " SIGN UP FAILED ";
    }






?>