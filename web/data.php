<?php
require_once("connection.php");


$LNAME=$_POST['LASTNAME'];
$FNAME=$_POST['FIRSTNAME'];

$sql="INSERT INTO STEVENTABLE(LASTNAME,FIRSTNAME) VALUES ('$LNAME','$FNAME')";
if(mysql_query($sql))
{
	echo " DONE ";
}
else
{
	echo " FAILED ";
}




?>