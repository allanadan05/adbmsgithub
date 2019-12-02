<?php
include('connection.php');

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
        header("location: adminindex.php");
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
$anfrom=$_POST['anfrom'];
$userid=$_POST['hiddensendid'];

$sql = "INSERT INTO announcementtbl(antitle,andetails,dateposted,anfrom,userid) VALUES ('$antitle','$andetails','$dateposted','$anfrom','$userid')";
if(mysqli_query($con,$sql))
    {
        header("location: adminstudents.php?notifsent=success");
    }
    else
    {
        header("location: adminstudents.php?notifsent=failed");
    }
}





?>