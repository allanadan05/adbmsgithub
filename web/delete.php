<?php
require_once("connection.php");

$ID=$_GET['ID'];
mysql_query("DELETE FROM STEVEN_TABLE WHERE ID=$ID");


header("refresh:0.01; url=http://localhost/web/display.php");
?>
