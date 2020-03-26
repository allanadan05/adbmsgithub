<?php
@session_start();
//error_reporting(1);
// (adminstudents.php) and (teacherstudents.php)
if(isset($_POST['chEm']) && $_POST['chEm'] != "" )
{
        include_once 'connection.php';
        $email=$_POST['chEm'];
		$sql_em_check =mysqli_query($con,"SELECT email FROM userstbl WHERE email='$email' LIMIT 1");
		$checkemail = mysqli_num_rows($sql_em_check);
	if($checkemail < 1)
	{
	echo '<strong style="color:green;">'.$email.'</strong><span style="color:green;"> is Available</span>';
	exit();
	}
	else
	{
	echo '<strong style="color:red;">'.$email.'</strong> <span style="color:red;"> Email already exist</span>';
	exit();
	}
}

if(isset($_POST['chpwd']) && $_POST['chpwd'] != "" )
{
	  $pw=preg_replace('#[^a-z0-9]#i', '', $_POST['chpwd']);
	if(strlen($pw) < 4)
	{
		echo '<h6 style="color: red">Password must be more than 4 characters</h6>';
		exit();
	}
}
// // (adminstudents.php) and (teacherstudents.php)

// validation (adminstudents.php) and  (adminteachers.php) and (teacherstudents.php)

// validation for limit 2 charracter  in firstname
if(isset($_POST['checkFn']) && $_POST['checkFn'] != "" )
{
  $fn = $_POST['checkFn'];
	if(strlen($fn) < 2)
	{
		echo '<h6 style="color: red">2 characters above</h6>';
		exit();
	}

  if(is_numeric($fn[0]))
  {
    echo '<h6 style="color: red">First character must be a letter</h6>';
    exit();
  }
}

// validation for limit 2 charracter  in middlename
if(isset($_POST['checkMn']) && $_POST['checkMn'] != "" )
{
  $mn = $_POST['checkMn'];
	if(strlen($mn) < 2)
	{
		echo '<h6 style="color: red">2 characters above</h6>';
		exit();
	}

  if(is_numeric($mn[0]))
  {
    echo '<h6 style="color: red">First character must be a letter</h6>';
    exit();
  }
}

// validation for limit 2 charracter  in lasttname
if(isset($_POST['checkLn']) && $_POST['checkLn'] != "" )
{
  $ln = $_POST['checkLn'];
	if(strlen($ln) < 2)
	{
		echo '<h6 style="color: red">2 characters above</h6>';
		exit();
	}

  if(is_numeric($ln[0]))
  {
    echo '<h6 style="color: red">First character must be a letter</h6>';
    exit();
  }
}

// validation (adminstudents.php) and  (adminteachers.php) and (teacherstudents.php)

//----

// adminteachers.php


if(isset($_POST['chkEmail']) && $_POST['chkEmail']!="")
{
			include_once 'connection.php';
			$email=$_POST['chkEmail'];
			$sql_em_check =mysqli_query($con,"SELECT email FROM teacherstbl WHERE email='$email' LIMIT 1");
			$checkemail = mysqli_num_rows($sql_em_check);
		if($checkemail < 1)
		{
		echo '<strong style="color:green;">'.$email.'</strong><span style="color:green;"> is Available</span>';
		exit();
		}
		else
		{
		echo '<strong style="color:red;">'.$email.'</strong> <span style="color:red;"> Email already exist</span>';
		exit();
		}
}

if(isset($_POST['chpwdTeacher']) && $_POST['chpwdTeacher'] != "" )
{
	  $pw=preg_replace('#[^a-z0-9]#i', '', $_POST['chpwdTeacher']);
	if(strlen($pw) < 4)
	{
		echo '<h6 style="color: red">Password must be more than 4 characters</h6>';
		exit();
	}
}

// adminteachers.php

//----




include 'connection.php';
@$studName=$_GET['tokenStudName'];
if($studName=="fullName")
{
	$id=$_GET['id'];
	$sql="SELECT * FROM userstbl WHERE userid=$id";
	$query=mysqli_query($con,$sql);
	$obj = array();
	 while ($row = mysqli_fetch_array($query))
	 	{
			$obj['lname']=$row['lname'];
			$obj['fname']=$row['fname'];
			$obj['mname']=$row['mname'];
		}
		$printName = json_encode($obj);
		echo $printName;
}


// admin setting (adminsettings.php)

@$token_accSetting=$_POST['accSetting'];
@$accSetting=$_POST['accSetting'];
if(isset($accSetting))
{
	$adminid=mysqli_escape_string($con,$_POST['adminid']);
	$email=mysqli_escape_string($con,$_POST['email']);
	$password=mysqli_escape_string($con,$_POST['password']);
	//image import
	$image = $_FILES['myfile']['name'];
	$temp = $_FILES['myfile']['tmp_name'];
	//image import

	if(isset($token_accSetting))
	{

			
			if(isset($image) && ($image!=""))
			{
				$oldimg="SELECT adminimage FROM admintbl WHERE adminid='".$adminid."' ";
				$queryoldimg=mysqli_query($con,$oldimg);
				$fetcholdimg=mysqli_fetch_array($queryoldimg);
				unlink("images/admin_picture/".$fetcholdimg['adminimage']); //delete na luma image
				move_uploaded_file($temp,"images/admin_picture/".$image);
				$sql_accSetting = "UPDATE admintbl set email='".$email."', password='".$password."', adminimage='".$image."' WHERE adminid='".$adminid."' ";
				$sql_query_accSetting = mysqli_query($con,$sql_accSetting) or die (mysqli_connect_error($con));

				if($sql_query_accSetting)
				{
					header("location: adminsettings.php?admin=accSettting");
				}
			}
			else
			{
					$sql_accSetting = "UPDATE admintbl set email='".$email."', password='".$password."' WHERE adminid='".$adminid."' ";
					$sql_query_accSetting = mysqli_query($con,$sql_accSetting) or die (mysqli_connect_error($con));

					if($sql_query_accSetting)
					{
						header("location: adminsettings.php?admin=accSetting");
					}
				
			}
	}
	
}


@$token_personalInfo=$_POST['personalInfo'];
@$personalInfo=$_POST['personalInfo'];
if(isset($personalInfo))
{
	$adminid=mysqli_escape_string($con,$_POST['adminid']);
	$fname=mysqli_escape_string($con,$_POST['fname']);
	$lname=mysqli_escape_string($con,$_POST['lname']);
	$mname=mysqli_escape_string($con,$_POST['mname']);
		
	if(isset($token_personalInfo))
	{
		$sql_personalInfo= "UPDATE admintbl set fname='".$fname."', lname='".$lname."', mname='".$mname."' WHERE adminid='".$adminid."' ";
		$sql_query_personalInfo = mysqli_query($con,$sql_personalInfo) or die (mysqli_connect_error($con));

		if($sql_query_personalInfo)
		{
			header("location: adminsettings.php?admin=personalInfo");
		}
	}
}
// admin setting (adminsettings.php)



// teacher setting (teachersettings.php)

@$tokenteacher_accSetting=$_POST['accSetting_teacher'];
@$accteacherSetting=$_POST['accSetting_teacher'];
if(isset($accteacherSetting))
{

	$id=mysqli_escape_string($con,$_POST['teacherid']);
	$email=mysqli_escape_string($con,$_POST['email']);
	$password=mysqli_escape_string($con,$_POST['password']);
	$_SESSION['email'] = $email; // hold value email for replace to session in teacher email
	//image import
	$image = $_FILES['myfileTeacher']['name'];
	$temp = $_FILES['myfileTeacher']['tmp_name'];
	$new_name = "(".rand().") ".$image;
	//image import
	
	if(isset($tokenteacher_accSetting))
	{
			
			if(strlen($password)<4)
			{
				header("location: teachersettings.php?password=tooShort");
			}
			else
			{
				if(isset($image) && ($image!=""))
				{
				$oldimg="SELECT image FROM teacherstbl WHERE teachersid='".$id."' ";
				$queryoldimg=mysqli_query($con,$oldimg);
				$fetcholdimg=mysqli_fetch_array($queryoldimg);
				unlink("images/teacher_picture/".$fetcholdimg['image']); //delete na luma image
				move_uploaded_file($temp,"images/teacher_picture/".$new_name);
				$sqlTeacher_accSetting = "UPDATE teacherstbl set email='".$email."', password='".$password."', image='".$new_name."' WHERE teachersid='".$id."' ";
				mysqli_query($con,$sqlTeacher_accSetting) or die (mysqli_connect_error($con));
				header("location: teachersettings.php?teacher=accSettting");
				}
				else{

					$sql_accSetting = "UPDATE teacherstbl set email='".$email."', password='".$password."' WHERE teachersid='".$id."' ";
					mysqli_query($con,$sql_accSetting) or die (mysqli_connect_error($con));
					header("location: teachersettings.php?teacher=accSettting");
				}
			}
	}
	
}


@$tokenteacher_personalInfo=$_POST['teacher_personalInfo'];
@$teacherpersonalInfo=$_POST['teacherpersonalInfo'];
if(isset($teacherpersonalInfo))
{
	$id=mysqli_escape_string($con,$_POST['teacheridInfo']);
	$fname=mysqli_escape_string($con,$_POST['fname_teacher']);
	$lname=mysqli_escape_string($con,$_POST['lname_teacher']);
	$mname=mysqli_escape_string($con,$_POST['mname_teacher']);
	if(isset($tokenteacher_personalInfo))
	{
		$sql_personalInfo= "UPDATE teacherstbl set fname='".$fname."', lname='".$lname."', mname='".$mname."' WHERE teachersid='".$id."' ";
		mysqli_query($con,$sql_personalInfo) or die (mysqli_connect_error($con));
		header("location: teachersettings.php?teacher=personalInfo");
	}
}
// teacher setting (teachersettings.php)


// student setting (settings.php)

@$tokenuser_accSetting=$_POST['accSetting_user'];
@$accuserSetting=$_POST['accuserSetting'];
if(isset($accuserSetting))
{

	$id=mysqli_escape_string($con,$_POST['userid']);
	$email=mysqli_escape_string($con,$_POST['email_user']);
	$password=mysqli_escape_string($con,$_POST['password_user']);
	$_SESSION['email'] = $email; // hold value email for replace to session in student email
	//image import
	$image = $_FILES['myfileUser']['name'];
	$temp = $_FILES['myfileUser']['tmp_name'];
	$new_name = "(".rand().") ".$image;
	//image import
	
	if(isset($tokenuser_accSetting))
	{
			if(strlen($password)<4)
			{
				header("location: settings.php?password=tooShort");
			}
			else
			{
				if(isset($image) && ($image!=""))
				{
				$oldimg="SELECT image FROM userstbl WHERE userid='".$id."' ";
				$queryoldimg=mysqli_query($con,$oldimg);
				$fetcholdimg=mysqli_fetch_array($queryoldimg);
				unlink("images/profile_picture/".$fetcholdimg['image']); //delete na luma image
				move_uploaded_file($temp,"images/profile_picture/".$new_name);
				$sqlTeacher_accSetting = "UPDATE userstbl set email='".$email."', password='".$password."', image='".$new_name."' WHERE userid='".$id."' ";
				mysqli_query($con,$sqlTeacher_accSetting) or die (mysqli_connect_error($con));
				header("location: settings.php?user=accSettting");
				}
				else{

					$sql_accSetting = "UPDATE userstbl set email='".$email."', password='".$password."' WHERE userid='".$id."' ";
					mysqli_query($con,$sql_accSetting) or die (mysqli_connect_error($con));
					header("location: settings.php?user=accSettting");
				}
			}
	}
	
}


@$tokenuser_personalInfo=$_POST['personalInfo_user'];
@$userpersonalInfo=$_POST['personalInfouser'];
if(isset($userpersonalInfo))
{
	$id=mysqli_escape_string($con,$_POST['useridInfo']);
	$fname=mysqli_escape_string($con,$_POST['fname_user']);
	$lname=mysqli_escape_string($con,$_POST['lname_user']);
	$mname=mysqli_escape_string($con,$_POST['mname_user']);
	if(isset($tokenuser_personalInfo))
	{
		$sql_personalInfo= "UPDATE userstbl set fname='".$fname."', lname='".$lname."', mname='".$mname."' WHERE userid='".$id."' ";
		mysqli_query($con,$sql_personalInfo) or die (mysqli_connect_error($con));
		header("location: settings.php?user=personalInfo");
	}
}
// setting (teachersettings.php)


?>

