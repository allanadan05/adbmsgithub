<?php
require_once("connection.php");
$ID=$_POST['ID'];
$Pword=$_POST['PASSWORD'];
$Name=$_POST['NAME'];

mysql_query("UPDATE STEVEN_TABLE SET PASSWORD='$Pword',NAME='$Name' WHERE ID=$ID");
echo "record Updated!";
header("refresh:0.01; url=http://localhost/web/display.php");
?>