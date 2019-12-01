<?php 
include('connection.php');

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

?>
