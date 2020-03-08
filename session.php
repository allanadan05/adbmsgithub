<?php
@session_start();
include('connection.php');
$logacc="Log In";
     @$userprofile=@$_SESSION['email'];
  

     $ASK=" SELECT * FROM `userstbl` WHERE email='$userprofile' ";
     $INFO=mysqli_query($con, $ASK);
     $result=mysqli_fetch_assoc($INFO);
     
     if($userprofile == true){
      /*
      $adminid=$result['userid'];
      $logacc=$result['email'];
      $lname=$result['lname'];
      $fname=$result['fname'];
      */
      $_SESSION['id']=$result['userid'];
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