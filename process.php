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

?>

