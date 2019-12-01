<?php 
include('connection.php');

if(isset($_GET['palatandaan'])){

$palatandaan =  $_GET['palatandaan'];

if($palatandaan =="editsection"){
	$id=$_GET['forwardedid'];
	$querySaDatabase = "SELECT * FROM sectiontbl WHERE sectionid='$id' ";
	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['secid'] = $row['sectionid'];
			$pambato['secname'] = $row['sectionname'];
		}
		echo json_encode($pambato);
}

if($palatandaan =="editdept"){
	$id=$_GET['forwardedid'];
	$querySaDatabase = "SELECT * FROM departmenttbl WHERE deptid='$id' ";
	$executeQuery = mysqli_query($con, $querySaDatabase);
		$pambato = array();
		while($row = mysqli_fetch_array($executeQuery)){
			$pambato['deptid'] = $row['deptid'];
			$pambato['deptname'] = $row['departmentname'];
		}
		echo json_encode($pambato);
}

}

if(isset($_POST['addsection'])){
			//echo $_POST['addsection'] ." POST addsection <br>";
		
			$nsn = $_POST['newsectionname'];	
			//echo $nsn ."POST newsectionname <br> ";		
			$query = "INSERT INTO sectiontbl(sectionname) VALUES ('$nsn')";
			//echo $query ."query <br>";	
			$check=mysqli_query($con, $query) or die('Query error');

			if($check){
				header("location: adminsections.php?addsecresult=success&secname=".$nsn);
			}else{
				header("location: adminsections.php?addsecresult=failed&secname=".$nsn);
			}
}	

if(isset($_POST['adddept'])){
			//echo $_POST['addsection'] ." POST addsection <br>";
		
			$ndn = $_POST['newdeptname'];	
			//echo $nsn ."POST newsectionname <br> ";		
			$query = "INSERT INTO departmenttbl (departmentname) VALUES ('$ndn')";
			//echo $query ."query <br>";	
			$check=mysqli_query($con, $query) or die('Query error');

			if($check){
				header("location: adminsections.php?adddeptresult=success&secname=".$nsn);
			}else{
				header("location: adminsections.php?adddeptresult=failed&secname=".$nsn);
			}
}	


if(isset($_POST['editsecsubmit'])){
	
			$nsn = $_POST['newsectionname'];
			$id = $_POST['hiddenname'];	
			$query = "UPDATE sectiontbl SET sectionname='$nsn' WHERE sectionid='$id' ";
			$check=mysqli_query($con, $query) or die('Query error');
			if($check){
				header("location: adminsections.php?editsecresult=success&secname=".$nsn);
			}else{
				header("location: adminsections.php?editsecresult=failed&secname=".$nsn);
			}
}	

if(isset($_POST['editdeptsubmit'])){
		
			$ndn = $_POST['newdeptname'];
			$id = $_POST['hiddendeptname'];		
			$query = "UPDATE departmenttbl SET departmentname='$ndn' WHERE deptid='$id' ";
			$check=mysqli_query($con, $query) or die('Query error');
			if($check){
				header("location: adminsections.php?editdeptresult=success&deptname=".$ndn);
			}else{
				header("location: adminsections.php?editdeptresult=failed&deptname=".$ndn);
			}
}

if(isset($_GET['deletesection'])){
    $id=$_GET['id'];
     
   $query = "DELETE FROM sectiontbl WHERE sectionid='$id' ";
   $check = mysqli_query($con , $query) or die('Query error');
    if($check)
        {
            header("location: adminsections.php?deletesecresult=success");
        }
        else
        {
            header("location: adminsubjects.php?deletesecresult=failed");
        }
}

if(isset($_GET['deletedept'])){
    $id=$_GET['id'];
     
   $query = "DELETE FROM departmenttbl WHERE deptid='$id' ";
   $check = mysqli_query($con , $query) or die('Query error');
    if($check)
        {
            header("location: adminsections.php?deletedeptresult=success");
        }
        else
        {
            header("location: adminsubjects.php?deletedeptresult=failed");
        }
}


?>
