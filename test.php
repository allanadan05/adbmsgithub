<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
	
	<table border=2>
		<tr>
			<th>name</th>
			
			
		</tr>
<?php
include('connection.php');

$sql="SELECT sectiontbl.sectionname,count(userstbl.userid) as 'number of students' from userstbl join sectiontbl on userstbl.sectionid=sectiontbl.sectionid group by sectiontbl.sectionname ";
$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)){
 while($row = mysqli_fetch_array($result))
 {
    echo "<tr>";
	echo "<td>".$row['sectionname']."</td>";
	echo "<td>".$row['number of students']."</td>";
    echo "</tr>";

 }

}






?>
</table>

</html>