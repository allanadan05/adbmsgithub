<?php
include('connection.php');

$palatandaan =  $_GET['palatandaan'];



if($palatandaan =="edit"){
	$id=$_GET['forIpinasa'];

	$querySaDatabase = "SELECT * FROM subjecttbl WHERE subjectid='$id' ";
	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['sname'] = $row['subjectname'];
			$pambato['sdesc'] = $row['subjectdesc'];
		}
	echo json_encode($pambato);
}

if($palatandaan=="update"){
		
			$sn = $_GET['subname'];
			$sd = $_GET['subdes'];
			$uId = $_GET['uId'];

			
			$q = "UPDATE subjecttbl SET subjectname='$sn', subjectdesc='$sd', WHERE subjectid='$uId' ";
			$u = mysqli_query($con , $q);
			if($u){
				echo "$sn EDITED successfully";
			}
}	

if($palatandaan=="showassignedsections"){
		
	$subjectid = $_GET['subjectid'];
		
	$sql="SELECT * from sectiontbl ";
	$result=mysqli_query($con, $sql);

	if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_array($result)){
	echo '<ul>
		<label>';
		// check section if already assigned to a subject
	echo'
	<input type="checkbox" onclick="assignsectiontosubject('.$row['sectionid'].','.$subjectid.')" value=" '.$row['sectionid'].' " name=" '.$row['sectionname'] .' "
	';

	$sqlss="SELECT * from sectionsubjecttbl where sectionid=".$row['sectionid'];
		$resultss=mysqli_query($con, $sqlss);
		if(mysqli_num_rows($resultss)){
		while($rowss = mysqli_fetch_array($resultss)){
		if($rowss['subjectid'] == $subjectid ){
			echo "checked=checked";
		}
		}
	}

	echo '>'; //end tag of input type chekbox
	echo " " .$row['sectionname'];

	echo '
	</label>
	</ul>
	';
	
	}
	}
	
}	

if($palatandaan=="showassignedsubjects"){
		
	$teachersid = $_GET['teachersid'];
		
	$sql="SELECT * from subjecttbl";
	$result=mysqli_query($con, $sql);
	if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_array($result)){
	echo '<ul>
		<label>';
		// check teacher if already assigned to a subject
	echo'
	<input type="checkbox" onclick="assignsubjecttoteacher('.$row['subjectid'].','.$teachersid.')" value=" '.$row['subjectid'].' " name=" '.$row['subjectname'] .' "
	';

	$sqlss="SELECT * from teachersubjecttbl where subjectid=".$row['subjectid'];
	$resultss=mysqli_query($con, $sqlss);
	if(mysqli_num_rows($resultss)){
	while($rowss = mysqli_fetch_array($resultss)){
		if($rowss['teachersid'] == $teachersid ){
			echo "checked=checked";
		}
		}
	}

	echo '>'; //end tag of input type chekbox
	echo " " .$row['subjectname'];

	echo '
	</label>
	</ul>
	';
	
	}
	}
	
}	

if($palatandaan=="assignsectiontosubject"){
	include('connection.php');	
    
    $secid=$_GET['secid'];
	$subid=$_GET['subid'];
	$allow=1;
	
	$s="SELECT * FROM sectionsubjecttbl";
	$r=mysqli_query($con, $s);
	if(mysqli_num_rows($r)){
		while($row = mysqli_fetch_array($r)){
			if($row['sectionid']==$secid && $row['subjectid']==$subid ){
				$allow=0;
				// echo 'Already assigned!';
					$del="DELETE FROM sectionsubjecttbl WHERE sectionsubjectid=".$row['sectionsubjectid'];
					if(mysqli_query($con, $del)){
						// echo 'Deleted!';
					}
			break;
			}
		}
	}

	if($allow==1){
		$sql="INSERT INTO sectionsubjecttbl(sectionid,subjectid) VALUES ('$secid','$subid')";
		if(mysqli_query($con,$sql))
		{   
			// echo 'Successfully assigned!';
		}
		else
		{
			echo 'Cannot be assigned!';
		}
	}
}


if($palatandaan=="assignsubjecttoteacher"){
	include('connection.php');	
    
    $teachersid=$_GET['teachersid'];
	$subid=$_GET['subid'];
	$allow=1;
	
	$s="SELECT * FROM teachersubjecttbl";
	$r=mysqli_query($con, $s);
	if(mysqli_num_rows($r)){
		while($row = mysqli_fetch_array($r)){
			if($row['teachersid']==$teachersid && $row['subjectid']==$subid ){
				$allow=0;
				// echo 'Already assigned!';
					$del="DELETE FROM teachersubjecttbl WHERE teachersubjectid=".$row['teachersubjectid'];
					if(mysqli_query($con, $del)){
						// echo 'Deleted!';
					}
			break;
			}
		}
	}

	if($allow==1){
		$sql="INSERT INTO teachersubjecttbl(teachersid,subjectid) VALUES ('$teachersid','$subid')";
		if(mysqli_query($con,$sql))
		{   
			// echo 'Successfully assigned!';
		}
		else
		{
			echo 'Cannot be assigned!';
		}
	}
}


if($palatandaan=="searchscore"){
	include('connection.php');	

	$selectvalue=$_GET['selectvalue'];
	$tosearch=$_GET['tosearch'];
	$test=0;

	if($tosearch==""){
		$sql="select userid, (select userid from userstbl where userid=scoretbl.userid) as studuserid, (select concat(lname, ', ', fname) as name from userstbl where userstbl.userid=scoretbl.userid) as user, (SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname, concat(totalscore, '/', totalitems) as score, averagescore, remarks from scoretbl";
				$result=mysqli_query($con, $sql);
				if(mysqli_num_rows($result)){
					while($row=mysqli_fetch_array($result)){
							echo "<tr>";
							echo" <td>".$row['user']."</td>";
							echo" <td>".$row['quizname']."</td>";
							echo "<td>".$row['score']."</td>";
							echo "<td>".$row['averagescore']."%"."</td>";
							$rem=$row['remarks'];

								if($rem=="PASSED"){
									$rem2="class='process'";
								}else{
									$rem2="class='denied'";
								}
							echo" <td ".$rem2.">".$row['remarks']."</td>
							</tr>";
					}
				}else{
					echo "<tr><td></td><td>No data found in scoretbl.</td><td></td><td></td><td></td></tr>";
				}
	}else{
		if($selectvalue=="byname"){

			$sql="select userid, (select userid from userstbl where userid=scoretbl.userid) as studuserid, (select concat(lname, ', ', fname) as name from userstbl where userstbl.userid=scoretbl.userid) as user, (SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname, concat(totalscore, '/', totalitems) as score, averagescore, remarks from scoretbl";
			$result=mysqli_query($con, $sql);
			if(mysqli_num_rows($result)){
				$test==0;
				while($row=mysqli_fetch_array($result)){
					if ( stristr( $row['user'], $tosearch ) ){
						$test=1;
						echo "<tr>";
						echo" <td>".$row['user']."</td>";
						echo" <td>".$row['quizname']."</td>";
						echo "<td>".$row['score']."</td>";
						echo "<td>".$row['averagescore']."%"."</td>";
						$rem=$row['remarks'];

							if($rem=="PASSED"){
								$rem2="class='process'";
							}else{
								$rem2="class='denied'";
							}
						echo" <td ".$rem2.">".$row['remarks']."</td>
						</tr>";
					}
				}
				if($test==0){
					echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
				}
			}else{
				echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
			}

		}else if($selectvalue=="bysection"){

		}else if($selectvalue=="bysubject"){

		}else if($selectvalue=="byquiztitle"){

			$sql="select userid, (select userid from userstbl where userid=scoretbl.userid) as studuserid, (select concat(lname, ', ', fname) as name from userstbl where userstbl.userid=scoretbl.userid) as user, (SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname, concat(totalscore, '/', totalitems) as score, averagescore, remarks from scoretbl";
			$result=mysqli_query($con, $sql);
			if(mysqli_num_rows($result)){
				$test==0;
				while($row=mysqli_fetch_array($result)){
					if ( stristr( $row['quizname'], $tosearch ) ){
						$test=1;
						echo "<tr>";
						echo" <td>".$row['user']."</td>";
						echo" <td>".$row['quizname']."</td>";
						echo "<td>".$row['score']."</td>";
						echo "<td>".$row['averagescore']."%"."</td>";
						$rem=$row['remarks'];

							if($rem=="PASSED"){
								$rem2="class='process'";
							}else{
								$rem2="class='denied'";
							}
						echo" <td ".$rem2.">".$row['remarks']."</td>
						</tr>";
					}
				}
				if($test==0){
					echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
				}
			}else{
				echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
			}

		}else if($selectvalue=="byscore"){

			$sql="select userid, totalscore, (select userid from userstbl where userid=scoretbl.userid) as studuserid, (select concat(lname, ', ', fname) as name from userstbl where userstbl.userid=scoretbl.userid) as user, (SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname, concat(totalscore, '/', totalitems) as score, averagescore, remarks from scoretbl";
			$result=mysqli_query($con, $sql);
			if(mysqli_num_rows($result)){
				$test==0;
				while($row=mysqli_fetch_array($result)){
					if ( stristr( $row['totalscore'], $tosearch ) ){
						$test=1;
						echo "<tr>";
						echo" <td>".$row['user']."</td>";
						echo" <td>".$row['quizname']."</td>";
						echo "<td>".$row['score']."</td>";
						echo "<td>".$row['averagescore']."%"."</td>";
						$rem=$row['remarks'];

							if($rem=="PASSED"){
								$rem2="class='process'";
							}else{
								$rem2="class='denied'";
							}
						echo" <td ".$rem2.">".$row['remarks']."</td>
						</tr>";
					}
				}
				if($test==0){
					echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
				}
			}else{
				echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
			}

		}else if($selectvalue=="byaveragescore"){

			$sql="select userid, (select userid from userstbl where userid=scoretbl.userid) as studuserid, (select concat(lname, ', ', fname) as name from userstbl where userstbl.userid=scoretbl.userid) as user, (SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname, concat(totalscore, '/', totalitems) as score, averagescore, remarks from scoretbl";
			$result=mysqli_query($con, $sql);
			if(mysqli_num_rows($result)){
				$test==0;
				while($row=mysqli_fetch_array($result)){
					if ( stristr( $row['averagescore'], $tosearch ) ){
						$test=1;
						echo "<tr>";
						echo" <td>".$row['user']."</td>";
						echo" <td>".$row['quizname']."</td>";
						echo "<td>".$row['score']."</td>";
						echo "<td>".$row['averagescore']."%"."</td>";
						$rem=$row['remarks'];

							if($rem=="PASSED"){
								$rem2="class='process'";
							}else{
								$rem2="class='denied'";
							}
						echo" <td ".$rem2.">".$row['remarks']."</td>
						</tr>";
					}
				}
				if($test==0){
					echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
				}
			}else{
				echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
			}

		}else if($selectvalue=="byremarks"){

			$sql="select userid, (select userid from userstbl where userid=scoretbl.userid) as studuserid, (select concat(lname, ', ', fname) as name from userstbl where userstbl.userid=scoretbl.userid) as user, (SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname, concat(totalscore, '/', totalitems) as score, averagescore, remarks from scoretbl";
			$result=mysqli_query($con, $sql);
			if(mysqli_num_rows($result)){
				$test==0;
				while($row=mysqli_fetch_array($result)){
					if ( stristr( $row['remarks'], $tosearch ) ){
						$test=1;
						echo "<tr>";
						echo" <td>".$row['user']."</td>";
						echo" <td>".$row['quizname']."</td>";
						echo "<td>".$row['score']."</td>";
						echo "<td>".$row['averagescore']."%"."</td>";
						$rem=$row['remarks'];

							if($rem=="PASSED"){
								$rem2="class='process'";
							}else{
								$rem2="class='denied'";
							}
						echo" <td ".$rem2.">".$row['remarks']."</td>
						</tr>";
					}
				}
				if($test==0){
					echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
				}
			}else{
				echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
			}


		}else{
			echo "<tr><td></td><td>No data found.</td><td></td><td></td><td></td></tr>";
		}
	}

}

?>

