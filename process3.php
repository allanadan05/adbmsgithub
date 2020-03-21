<?php
//error_reporting(1);
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
/*
include 'connection.php';
$action=$_GET['mul_del'];
if($action=="ajaxMulitpleDelete")
	{
		$id=$_GET['id'];
		$delAjax="DELETE FROM userstbl WHERE userid=$id";
		$sqlAjaxDel=mysqli_query($con,$delAjax);
	}
*/


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
	if(isset($token_accSetting))
	{
			$adminid=mysqli_escape_string($con,$_POST['adminid']);
			$email=mysqli_escape_string($con,$_POST['email']);
			$password=mysqli_escape_string($con,$_POST['password']);
			//image import
			$image = $_FILES['myfile']['name'];
			$temp = $_FILES['myfile']['tmp_name'];
			//image import
			
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
						header("location: adminsettings.php?admin=accSettting");
					}
				
			}
	}
	
}


@$token_personalInfo=$_POST['personalInfo'];
@$personalInfo=$_POST['personalInfo'];
if(isset($personalInfo))
{
	if(isset($token_personalInfo))
	{
		$adminid=mysqli_escape_string($con,$_POST['adminid']);
		$fname=mysqli_escape_string($con,$_POST['fname']);
		$lname=mysqli_escape_string($con,$_POST['lname']);
		$mname=mysqli_escape_string($con,$_POST['mname']);
		$sql_personalInfo= "UPDATE admintbl set fname='".$fname."', lname='".$lname."', mname='".$mname."' WHERE adminid='".$adminid."' ";
		$sql_query_personalInfo = mysqli_query($con,$sql_personalInfo) or die (mysqli_connect_error($con));

		if($sql_query_personalInfo)
		{
			header("location: adminsettings.php?admin=personalInfo");
		}
	}
}
// admin setting (adminsettings.php)


?>

