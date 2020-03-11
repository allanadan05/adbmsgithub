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
	echo '<strong style="color:red;">'.$email.'</strong> <span style="color:red;"> Already Exist Email</span>';
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
$studName=$_GET['tokenStudName'];
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

?>