<?php
session_start();
include('connection.php');

if(isset($_POST['loginsubmit'])){
/*
$userid=$_POST['userid'];
$email=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$teachersid=$_POST['teachersid'];
*/
// for security reason escape ng character baba

$userid=mysqli_escape_string($con,$_POST['userid']);
$email=mysqli_escape_string($con,$_POST['email']);
$password=mysqli_escape_string($con,$_POST['password']);
$fname=mysqli_escape_string($con,$_POST['fname']);
$lname=mysqli_escape_string($con,$_POST['lname']);
$mname=mysqli_escape_string($con,$_POST['mname']);
$teachersid=mysqli_escape_string($con,$_POST['teachersid']);



$sql="SELECT * FROM userstbl WHERE email='$email' AND password='$password'";
$insert=mysqli_query($con, $sql);
$result = mysqli_fetch_array($insert);
if($result['email'] == $email && $result['password']== $password){
        
        $_SESSION['userid']=$result['userid'];
        $_SESSION['email']=$result['email'];
        $_SESSION['lname']=$result['lname'];
        $_SESSION['fname']=$result['fname'];
        //header("Location: studentindex.php?login=s&fname=".$result['fname']);
        header("Location: studentindex.php");
        exit();
    
}else{
        $sql="SELECT * FROM teacherstbl WHERE email='$email' AND password='$password'";
        $insert=mysqli_query($con, $sql);
        $result = mysqli_fetch_array($insert);
        if($result['email'] == $email && $result['password']== $password){
            /*
            $_SESSION['teachersid']=$result['teachersid'];
            $_SESSION['email']=$result['email'];
            $_SESSION['lname']=$result['lname'];
            $_SESSION['fname']=$result['fname'];
            header("Location: teacherindex.php?login=s&fname=".$result['fname']);
            */

            $_SESSION['teachersid']=$result['teachersid'];
            $_SESSION['email']=$result['email'];
            $_SESSION['lname']=$result['lname'];
            $_SESSION['fname']=$result['fname'];
            header("Location: teacherindex.php");
            exit();
        }else{
            $sql="SELECT * FROM admintbl WHERE email='$email' AND password='$password'";
            $insert=mysqli_query($con, $sql);
            $result = mysqli_fetch_array($insert);
            if($result['email'] == $email && $result['password']== $password){
    
                $_SESSION['adminid']=$result['adminid'];
                $_SESSION['email']=$result['email'];
                $_SESSION['lname']=$result['lname'];
                $_SESSION['fname']=$result['fname'];
                //header("Location: adminindex.php?login=s&fname=".$result['fname']);
                header("Location: adminindex.php");
                exit();
            }else{
            header("Location: index.php?login=f");
            }
        }
    }
}

?>