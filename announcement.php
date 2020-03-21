<?php
@session_start();
include('connection.php');

if(isset($_POST['addAnnPerSubOrSecorDept'])){
$antitle=$_POST['antitle'];
$andetails=$_POST['andetails'];
$dateposted=$_POST['dateposted'];
$anfrom=$_POST['anfrom'];
$sectionid=$_POST['sectionid'];
$subjectid=$_POST['subjectid'];
$deptid=$_POST['deptid']; 


$sql = "INSERT INTO announcementtbl(antitle,andetails,dateposted,anfrom,sectionid,subjectid,deptid) VALUES ('$antitle','$andetails','$dateposted','$anfrom','$sectionid','$subjectid','$deptid')";
if(mysqli_query($con,$sql))
    {
        header("location: adminindex.php");
    }
    else
    {
        echo " send error ";
    }
}



if(isset($_POST['addAnnPerSubOrSec'])){
    $antitle=$_POST['antitle'];
    $andetails=$_POST['andetails'];
    $dateposted=$_POST['dateposted'];
    $anfrom=$_POST['anfrom'];
    $sectionid=$_POST['sectionid'];
    $subjectid=$_POST['subjectid'];    
    
    $sql = "INSERT INTO announcementtbl(antitle,andetails,dateposted,anfrom,sectionid,subjectid) VALUES ('$antitle','$andetails','$dateposted','$anfrom','$sectionid','$subjectid')";
    if(mysqli_query($con,$sql))
        {
            header("location: teacherindex.php");
        }
        else
        {
            echo " send error ";
        }
    }


if(isset($_POST['addAnnPerStudent'])){
$antitle=$_POST['antitle'];
$andetails=$_POST['andetails'];
$dateposted=$_POST['dateposted'];
$anfrom=$_POST['teachersname'];
//$anfrom=$_POST['anfrom'];
$userid=$_POST['hiddensendid'];

$sql = "INSERT INTO announcementtbl(antitle,andetails,dateposted,anfrom,userid) VALUES ('$antitle','$andetails','$dateposted','$anfrom','$userid')";
if(mysqli_query($con,$sql))
    {
        if($_SESSION['access']=="user"){
            header("Location: index.php?login=access"); //user cant access this
        }else if($_SESSION['access']=="teacher"){
            header("location: teacherstudents.php?notifsent=success");
        }else if($_SESSION['access']=="admin"){
            header("location: adminstudents.php?notifsent=success");
        }else{
            header("Location: index.php?login=access");
        }
    }
    else
    {
        if($_SESSION['access']=="user"){
            header("Location: index.php?login=access"); //user cant access this
        }else if($_SESSION['access']=="teacher"){
            header("location: teacherstudents.php?notifsent=failed");
        }else if($_SESSION['access']=="admin"){
            header("location: adminstudents.php?notifsent=failed");
        }else{
            header("Location: index.php?login=access");
        }
    }
}

if(isset($_POST['teachersendnotif_forstudent'])){
    $antitle=$_POST['antitle'];
    $andetails=$_POST['andetails'];
    $dateposted=$_POST['dateposted'];
    $anfrom=$_POST['lstudName'].", ".$_POST['fstudName']." ".$_POST['mstudName']." ";
    //$anfrom=$_POST['anfrom'];
    $userid=$_POST['hiddensendid'];
    
    $sql = "INSERT INTO announcementtbl(antitle,andetails,dateposted,anfrom,userid) VALUES ('$antitle','$andetails','$dateposted','$anfrom','$userid')";
    if(mysqli_query($con,$sql))
        {
            header("location: teacherstudents.php?notifsent=success");
        }
        else
        {
            header("location: teacherstudents.php?notifsent=failed");
        }
    }


?>