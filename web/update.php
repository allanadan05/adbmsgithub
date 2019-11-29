<?php
require_once("connection.php");
$ID=$_GET['ID'];
$query=mysql_query("SELECT * FROM STEVEN_TABLE WHERE ID=$ID");
$fetch=mysql_fetch_array($query);

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

	<form action="update2.php" method="POST">
	ID:<input type="hidden" name="ID" value="<?php echo $fetch['ID']?>"readonly>
	password:<input type="password" name="PASSWORD" value="<?php echo $fetch['PASSWORD']?>">
	<input type="submit" values="Save">

	
	</form>
</body>
</html>
	