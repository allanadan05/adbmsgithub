<?php
session_start();
include('connection.php');


$userid=$_POST['userid'];
$email=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$teachersid=$_POST['teachersid'];




$sql="SELECT * FROM userstbl WHERE email='$email' AND password='$password'";
$insert=mysqli_query($con, $sql);
$result = mysqli_fetch_array($insert);
    if($result['email'] == $email && $result['password']== $password){
        
        $_SESSION['userid']=$userid;
        $_SESSION['email']=$email;
        $_SESSION['lname']=$lname;
        $_SESSION['fname']=$fname;
        header("Location: studentindex.php");
        exit();
    
    }
    else{
        $sql="SELECT * FROM teacherstbl WHERE email='$email' AND password='$password'";
        $insert=mysqli_query($con, $sql);
        $result = mysqli_fetch_array($insert);
        if($result['email'] == $email && $result['password']== $password){
        $_SESSION['teachersid']=$teachersid;
        $_SESSION['email']=$email;
        $_SESSION['lname']=$lname;
        $_SESSION['fname']=$fname;
        header("Location: adminindex.php");
        exit();
        }



    }

?>