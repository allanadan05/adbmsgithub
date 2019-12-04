<?php
include('connection.php');


if(isset($_POST['addteachersubmit'])){
$email=$_POST['email'];
$pword=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$deptid=$_POST['deptid'];

$sql = "INSERT INTO teacherstbl(email,password,fname,lname,mname,deptid) VALUES ('$email','$pword','$fname','$lname','$mname','$deptid')";
if(mysqli_query($con,$sql)){
        $last_id=mysqli_insert_id($con);
        $sectionid=$_POST['section'];
        $subjectid=$_POST['subject'];
        $sql="INSERT INTO sectionsubjecttbl(sectionid,subjectid) VALUES ('$sectionid','$subjectid')";
        $Excutequery=mysqli_query($con,$sql);
        if($Excutequery){
        $sectionid=$_POST['section'];
        $sql="INSERT INTO teachersectiontbl(sectionid,teachersid) VALUES ('$sectionid','$last_id')";
        $Excutequery=mysqli_query($con,$sql);
        if($Excutequery){
            header("location: adminteachers.php?addsubresult=success");

        }
        
        
        }
        else
        {
            echo " SIGN UP FAILED ";
        }


}

}
if(isset($_POST['editteachersubmit'])){
    $id=$_POST['hiddenuserid'];
	$email=$_POST['email'];
	$pword=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $mname=$_POST['mname'];
    $deptid=$_POST['deptid'];
    $sectionid=$_POST['sectionid'];
    $subjectid=$_POST['subjectid'];
   

    

	$sql = "UPDATE teacherstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',deptid='$deptid' WHERE teachersid='$id' ";
	if(mysqli_query($con,$sql))
	    {
            $sql = "UPDATE teachersectiontbl SET sectionid='$sectionid' WHERE sectionid='$id' ";
	        if(mysqli_query($con,$sql))
	        { 

                $sql = "UPDATE teachersubjecttbl SET subjectid='$subjectid' WHERE subjectid='$id' ";
                if(mysqli_query($con,$sql))
                { 
                    header("location: adminteachers.php?editstudentresult=success&lname=".$lname."&fname=".$fname);
                }



            }
	       
	    }
	    else
	    {
	        header("location: adminteachers.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
	    }
}



?>