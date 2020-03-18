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


		$sql = "SELECT * FROM announcementtbl";
		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result)) {
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['antitle'] . "</td>";
				echo "<td>" . $row['andetails'] . "</td>";
				echo "<td>" . $row['dateposted'] . "</td>";
				echo "<td>" . $row['anfrom'] . "</td>";
				echo "</tr>";
			}
		}






		?>
	</table>

</html>