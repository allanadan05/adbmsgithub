<?php
@session_start();
include('connection.php');
$logacc="Log In";
     @$userprofile=@$_SESSION['email'];
     

     $ASK=" SELECT * FROM `admintbl` WHERE email='$userprofile' ";
     $INFO=mysqli_query($con, $ASK);
     $result=mysqli_fetch_assoc($INFO);
     
     if($userprofile == true){
        $adminid=$result['adminid'];
        $logacc=$result['email'];
        $lname=$result['lname'];
        $fname=$result['fname'];
        $id=$adminid;
     }
?>