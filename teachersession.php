<?php
@session_start();
include('connection.php');
$logacc="Log In";
$_SESSION['read']="not";
     @$userprofile=$_SESSION['email'];
     

     $ASK=" SELECT * FROM `teacherstbl` WHERE email='$userprofile' ";
     $INFO=mysqli_query($con, $ASK);
     $result=mysqli_fetch_assoc($INFO);
     
     if($userprofile == true){
        /*
        $teachersid=$result['teachersid'];
        $id=$teachersid;
        $logacc=$result['email'];
        $lname=$result['lname'];
        $fname=$result['fname'];
        */
        $_SESSION['tearcherid']=$result['teachersid'];
        $id=$_SESSION['tearcherid'];
        $teachersid=$id;
        $_SESSION['logacc']=$result['email'];
        $_SESSION['lname']=$result['lname'];
        $_SESSION['fname']=$result['fname'];
        
     }
?>