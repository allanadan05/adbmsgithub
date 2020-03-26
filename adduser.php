<?php
session_start();
include('connection.php');

if(isset($_POST['addstudentsubmit'])){
	/*
	$email=$_POST['email'];
	$pword=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mname=$_POST['mname'];
	$sectionid=$_POST['sectionid'];
	*/
	$email=mysqli_escape_string($con,$_POST['email']);
	$pword=mysqli_escape_string($con,$_POST['password']);
	$fname=mysqli_escape_string($con,$_POST['fname']);
	$lname=mysqli_escape_string($con,$_POST['lname']);
	$mname=mysqli_escape_string($con,$_POST['mname']);
	$sectionid=mysqli_escape_string($con,$_POST['sectionid']);

	$CheckEmail="SELECT * FROM userstbl WHERE email='".$email."'";
	$rowEmail=mysqli_query($con,$CheckEmail);
	
		// validation for user -- new line code :)
	    if(strlen($pword)<4)
	    {
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?password=tooShort");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?password=tooShort");
			}else{
				header("Location: index.php?login=access");
			}
		}
	    elseif(strlen($fname)<2){
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?fname=tooShort");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?fname=tooShort");
			}else{
				header("Location: index.php?login=access");
			}
		}
	    elseif(strlen($lname)<2){
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?lname=tooShort");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?lname=tooShort");
			}else{
				header("Location: index.php?login=access");
			}
		}
	    elseif(strlen($mname)<2){
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?mname=tooShort");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?mname=tooShort");
			}else{
				header("Location: index.php?login=access");
			}
		}
	    elseif(is_numeric($fname[0])){
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?fname=numberCannotAccept");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?fname=numberCannotAccept");
			}else{
				header("Location: index.php?login=access");
			}
		}
	    elseif(is_numeric($lname[0])){
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?lname=numberCannotAccept");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?lname=numberCannotAccept");
			}else{
				header("Location: index.php?login=access");
			}
		}
	    elseif(is_numeric($mname[0])){
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?mname=numberCannotAccept");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?mname=numberCannotAccept");
			}else{
				header("Location: index.php?login=access");
			}
		}		
	    elseif(mysqli_num_rows($rowEmail)>0){
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?exist=email");
			}else if($_SESSION['access']=="admin"){
				header("location: adminstudents.php?exist=email");
			}else{
				header("Location: index.php?login=access");
			}
		}
		else
		{
					$image = $_FILES['image']['name'];
					$img_temp= $_FILES['image']['tmp_name'];
					$new_name = "(".rand().") ".$image;
					
			$sql = "INSERT INTO userstbl(email,password,fname,lname,mname,image,sectionid) VALUES ('$email','$pword','$fname','$lname','$mname','$new_name','$sectionid')";
			//add image

						$_SESSION['upload_student']=$new_name;
						if($_SESSION['upload_student'])
						{
							move_uploaded_file($img_temp,"images/profile_picture/".$new_name);
							mysqli_query($con,$sql);
							if($_SESSION['access']=="user"){
								header("Location: index.php?login=access"); //user cant access this
							}else if($_SESSION['access']=="teacher"){
								header("location: teacherstudents.php?new=teacher");
							}else if($_SESSION['access']=="admin"){
								header("location: adminstudents.php?new=student");
							}else{
								header("Location: index.php?login=access");
							}
							
						}
					
		 			//header("location: adminstudents.php?new=student");
		}
	/*
	$sql = "INSERT INTO userstbl(email,password,fname,lname,mname,sectionid) VALUES ('$email','$pword','$fname','$lname','$mname','$sectionid')";
	if(mysqli_query($con,$sql))
	    {
	        header("location: adminstudents.php");
	    }
	    else
	    {
	        echo " SIGN UP FAILED ";
		}
		*/


}

if(isset($_POST['editstudentsubmit'])){
	/*
    $id=$_POST['hiddenuserid'];
	$email=$_POST['email'];
	$pword=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mname=$_POST['mname'];
	$sectionid=$_POST['sectionid'];
	*/
    $id=mysqli_escape_string($con,$_POST['hiddenuserid']);
	$email=mysqli_escape_string($con,$_POST['email']);
	$pword=mysqli_escape_string($con,$_POST['password']);
	$fname=mysqli_escape_string($con,$_POST['fname']);
	$lname=mysqli_escape_string($con,$_POST['lname']);
	$mname=mysqli_escape_string($con,$_POST['mname']);
	$sectionid=mysqli_escape_string($con,$_POST['sectionid']);

	/*
	$sql = "UPDATE userstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',sectionid='$sectionid' WHERE userid='$id' ";
	if(mysqli_query($con,$sql))
	    {
	        header("location: adminstudents.php?editstudentresult=success&lname=".$lname."&fname=".$fname);
	    }
	    else
	    {
	        header("location: adminstudents.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
		}
	*/

	
	$CheckEmail="SELECT * FROM userstbl WHERE email='".$email."' LIMIT 1";
	$rowEmail=mysqli_query($con,$CheckEmail);

	if(strlen($pword)<4)
	{
		header("location: adminstudents.php?password=tooShort");
	}
	else
	{
		//add image
		if(isset($_FILES['image']['name']) && ($_FILES['image']['name']!=""))
			{
				$image = $_FILES['image']['name'];
				$img_temp= $_FILES['image']['tmp_name'];
				$new_name = "(".rand().") ".$image; //
				$select_img=mysqli_query($con,"SELECT image FROM userstbl WHERE userid='".$id."'");
				$fetch_img=mysqli_fetch_array($select_img);
	
					$_SESSION['upload_student_new_image']=$image;
					if($_SESSION['upload_student_new_image'])
					{
					unlink("images/profile_picture/".$fetch_img['image']); //delete na luma image
					move_uploaded_file($img_temp,"images/profile_picture/".$new_name);
					$sql = "UPDATE userstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',image='$new_name',sectionid='$sectionid' WHERE userid='$id' ";
					mysqli_query($con,$sql);
					 header("location: adminstudents.php?editstudentresult=success");
					
					}

			}
		else
			{
			$sql = "UPDATE userstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',sectionid='$sectionid' WHERE userid='$id' ";
				mysqli_query($con,$sql);
				  $_SESSION["lname"]=$lname;
				$_SESSION["fname"]=$fname;
				 header("location: adminstudents.php?editstudentresult=success");

			}

	}

}



?>