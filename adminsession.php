<?php
@session_start();
include('connection.php');
$logacc="Log In";
     @$userprofile=@$_SESSION['email'];
     
     $ASK=" SELECT * FROM `admintbl` WHERE email='$userprofile' ";
     $INFO=mysqli_query($con, $ASK);
     $result=mysqli_fetch_assoc($INFO);
     
     if($userprofile == true){
        /*
        $adminid=$result['adminid'];
        $logacc=$result['email'];
        $lname=$result['lname'];
        $fname=$result['fname'];
        */
        $_SESSION['id']=$result['adminid'];
        $_SESSION['logacc']=$result['email'];
        $_SESSION['fname']=$result['fname'];
        $_SESSION['lname']=$result['lname'];
        //$id=$adminid;
        $id=$_SESSION['id'];
     }
     else
     {
        header("Location: index.php");
     }
?>