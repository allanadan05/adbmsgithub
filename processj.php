<?php
include('connection.php');
if(isset($_GET['palatandaan'])){
$palatandaan =  $_GET['palatandaan'];



if($palatandaan =="edit"){
	$id=$_GET['forIpinasa'];

	$querySaDatabase = "select *, (select subjectname from subjecttbl where subjectid=lessontbl.subjectid) as subjectname from lessontbl WHERE lessonid='$id' ";

	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['lessontitle'] = $row['lessontitle'];
			$pambato['lessondetail'] = $row['lessondetail'];
			$pambato['lessonpdf'] = $row['lessonpdf'];
			$pambato['lessonsubjectname'] = $row['subjectname'];
			$pambato['lessonsubjectid'] = $row['subjectid'];
		}
		echo json_encode($pambato);
}

if($palatandaan=="update"){
		
			$sn = $_GET['lessontitle'];
			$sd = $_GET['lessondetail'];
			$pdf = $_GET['lessonpdf']['name'];
			$uId = $_GET['uId'];

			
			$q = "UPDATE lessontbl SET lessontitle='$sn',lessonpdf='$pdf', lessondetail='$sd', WHERE subjectid='$uId' ";
			$u = mysqli_query($con , $q);
			if($u){
				echo "$sn EDITED successfully";
			}
}	




//edit teachers
if($palatandaan =="editsteacher"){
	$id=$_GET['forwardedid'];
	$querySaDatabase = "SELECT * FROM teacherstbl WHERE teachersid='$id' ";
	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['teachersid'] = $row['teachersid'];
			$pambato['email'] = $row['email'];
			$pambato['password'] = $row['password'];
			$pambato['fname'] = $row['fname'];
			$pambato['lname'] = $row['lname'];
			$pambato['mname'] = $row['mname'];
			$pambato['resultimage']=$row['image'];
			$pambato['SearchteachersdeptId'] = $row['deptid']; // find section by teacher compare to (department id for teacher)
			$findDeptId = $pambato['SearchteachersdeptId']; // hold value dept id niya

				// teachersPerSection
				$qq = "SELECT * FROM teachersectiontbl WHERE teachersid='$id' ";
				$ee = mysqli_query($con, $qq);
				$rr = mysqli_fetch_array($ee);
				if($rr['sectionid']<1){
					$pambato['sectionid'] ="0";
					$pambato['sectionname'] ="Nothing Assigned";
				}else{
					$pambato['sectionid'] = $rr['sectionid'];
					// teachersPerSection

					// finding section by teachers
					$ss="SELECT * FROM sectiontbl where sectionid=".$rr['sectionid'];
					$ff = mysqli_query($con, $ss);
					$tt = mysqli_fetch_array($ff);
					$pambato['sectionname'] = $tt['sectionname'];
					// finding section by teachers 
				}
					
			// finding a department para makuha o kumpara section hinahawakan ng teacher po			

			$deptid=$row['deptid'];
			
			$qq = "SELECT * FROM departmenttbl WHERE deptid='$deptid' ";
			$ee = mysqli_query($con, $qq);
			while ($rr = mysqli_fetch_array($ee)){
			$pambato['departmentname'] = $rr['departmentname'];
			$pambato['deptid'] = $rr['deptid'];
			
		}


		//$qq = "SELECT * FROM teachersectiontbl WHERE teachersid='$id' ";
		/*
		$qq = "SELECT * FROM teachersectiontbl WHERE sectionid='$id' ";
			$ee = mysqli_query($con, $qq);
			$rr = mysqli_fetch_array($ee);
			$pambato['sectionid'] = $rr['sectionid'];

			$ss="SELECT * FROM sectiontbl where sectionid=".$rr['sectionid'];
			$ff = mysqli_query($con, $ss);
			$tt = mysqli_fetch_array($ff);
			$pambato['sectionname'] = $tt['sectionname'];
		*/
	echo json_encode($pambato);

	}


}

if($palatandaan=="deleteannouncement"){
    $announceid=$_GET['announceid'];
    $admin=$_GET['admin'];
   $query = "DELETE FROM announcementtbl WHERE announceid='$announceid' ";
   $check = mysqli_query($con , $query) or die('Query error');
    if($check)
        {	
		
			$sql="SELECT * FROM announcementtbl WHERE anfrom='$admin' ORDER BY dateposted desc ";
			$result=mysqli_query($con, $sql);

			if(mysqli_num_rows($result)){
				while($row = mysqli_fetch_array($result))
				{ 
					echo "<div style='background-color: whitesmoke;'>
						<h4>".$row['antitle']."
						<button onclick='deleteannouncement(".$row['announceid'].")' class='btn btn-danger' style='float: right;'><i class='fa fa-trash' aria-hidden='true'></i></button><h4>
								<h6>".$row['dateposted']." |
									".$row['anfrom']."</h6>
								<p>".$row['andetails']."</p>
					</div>
					<br>";
				}
			}else{
			 echo"<div>No Announcement</div>";
			}
		 	
        }
        else
        {	
            echo"<div>No Announcement</div>";	
        }
}




}

if(isset($_GET['deleteteachers'])){
    $id=$_GET['id'];
     
   $query = "DELETE FROM teacherstbl WHERE teachersid='$id' ";
   $check = mysqli_query($con , $query) or die('Query error');
    if($check)
        {	
			$query = "DELETE FROM teachersectiontbl WHERE teachersid='$id' ";
			$check = mysqli_query($con , $query) or die('Query error');
				if($check){
				header("location: adminteachers.php?deleteteacherresult=success");	
				}
				
        }
        else
        {	
            header("location: adminteachers.php?deleteteacherresult=success");
        }
}


