<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
	
	<table border=2>
		<tr>
			<th>name</th>
			<th>email</th>
			<th>section</th>
		</tr>
<?php
include('connection.php');

$sql="SELECT userstbl.lname,userstbl.fname,userstbl.email,sectiontbl.sectionname from userstbl join sectiontbl on userstbl.userid=sectiontbl.sectionid";
$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)){
 while($row = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td>".$row['lname']." ".$row['fname']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['sectionname']."</td>";
    echo "</tr>";

 }

}






?>
</table>

</html>