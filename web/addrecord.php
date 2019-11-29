<?php

require_once("connection.php");

$Name=$_POST['NAME'];
$Pword=$_POST['PASSWORD'];

$sql="INSERT INTO STEVEN_TABLE(NAME,PASSWORD) VALUES ('$Name','$Pword')";
if(mysql_query($sql))
{
	
}
else
{
	
}
header("refresh:0.01; url=http://localhost/web/display.php");
?>
