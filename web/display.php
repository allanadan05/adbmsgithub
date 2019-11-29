<!DOCTYPE html>
<html>
<head>
<title></title>
</head>



<body>
	
	<table border=2>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>PASSWORD</th>
			<th>ACTION</th>
		</tr>

		

<?php
require_once("connection.php");

$getdata="SELECT * FROM STEVEN_TABLE";
$query=mysql_query($getdata);
while($fetch=mysql_fetch_assoc($query))
{
	echo "<tr>";
echo "<td>".$fetch['ID']."</td>";
echo "<td>".$fetch['NAME']."</td>";
echo "<td>".$fetch['PASSWORD']."</td>";
echo '<td><a href="delete.php?ID='.$fetch['ID'].'">DELETE </a> | <a id="update" href="update.php?ID='.$fetch['ID'].'">UPDATE</a></td>';


}


?>	
</table>

<button id="btn-toggle" type="button">Add</button>
<div id="input_form" style="display: none;">
<form action="addrecord.php" method="POST">
	name:<input type="text" name="NAME"><br>
	password:<input type="password" name="PASSWORD">
	<input type="submit" values="Save">
	</form>
</div>


 
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
  </script>
	

<script>
$(document).ready(function() {
$("#btn-toggle").click(function(){
	$("#input_form").toggle(500);
});
});
</script>

</body>
</html>