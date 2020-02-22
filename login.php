<?php
session_start();
include('connection.php');

if(isset($_POST['loginsubmit'])){
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
        
        $_SESSION['userid']=$result['userid'];
        $_SESSION['email']=$result['email'];
        $_SESSION['lname']=$result['lname'];
        $_SESSION['fname']=$result['fname'];
        header("Location: studentindex.php?login=s&fname=".$result['fname']);
        exit();
    
}else{
        $sql="SELECT * FROM teacherstbl WHERE email='$email' AND password='$password'";
        $insert=mysqli_query($con, $sql);
        $result = mysqli_fetch_array($insert);
        if($result['email'] == $email && $result['password']== $password){

            $_SESSION['teachersid']=$result['teachersid'];
            $_SESSION['email']=$result['email'];
            $_SESSION['lname']=$result['lname'];
            $_SESSION['fname']=$result['fname'];
            header("Location: teacherindex.php?login=s&fname=".$result['fname']);
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
                header("Location: adminindex.php?login=s&fname=".$result['fname']);
                exit();
            }else{
            header("Location: index.php?login=f");
            }
        }
    }
}

?>