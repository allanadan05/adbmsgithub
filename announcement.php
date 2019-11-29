<?php
include('connection.php');

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






?>