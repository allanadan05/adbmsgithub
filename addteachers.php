<?php
@session_start();
include('connection.php');


if (isset($_POST['addteachersubmit'])) {
    /*
    $email = $_POST['email'];
    $pword = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $deptid = $_POST['deptid'];
    */
	$email=mysqli_escape_string($con,$_POST['email']);
	$pword=mysqli_escape_string($con,$_POST['password']);
	$fname=mysqli_escape_string($con,$_POST['fname']);
	$lname=mysqli_escape_string($con,$_POST['lname']);
	$mname=mysqli_escape_string($con,$_POST['mname']);
	$deptid=mysqli_escape_string($con,$_POST['deptid']);

	$CheckEmail="SELECT * FROM teacherstbl WHERE email='".$email."'";
	$rowEmail=mysqli_query($con,$CheckEmail);


		// validation for user -- new line code :)
	    if(strlen($pword)<4)
	    {
			if($_SESSION['access']=="user"){
				header("Location: index.php?login=access"); //user cant access this
			}else if($_SESSION['access']=="teacher"){
				header("location: teacherstudents.php?password=tooShort");
			}else if($_SESSION['access']=="admin"){
				header("location: adminteachers.php?password=tooShort");
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
				header("location: adminteachers.php?fname=tooShort");
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
				header("location: adminteachers.php?lname=tooShort");
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
				header("location: adminteachers.php?mname=tooShort");
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
				header("location: adminteachers.php?fname=numberCannotAccept");
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
				header("location: adminteachers.php?lname=numberCannotAccept");
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
				header("location: adminteachers.php?mname=numberCannotAccept");
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
				header("location: adminteachers.php?exist=email");
			}else{
				header("Location: index.php?login=access");
			}
        }
        else
        {

            $image = $_FILES['image']['name'];
            $img_temp= $_FILES['image']['tmp_name'];
            $new_name = "(".rand().") ".$image;
            $sql = "INSERT INTO teacherstbl(email,password,fname,lname,mname,deptid,image) VALUES ('$email','$pword','$fname','$lname','$mname','$deptid','$new_name')";
            $_SESSION['upload_student']=$new_name;
            if($_SESSION['upload_student'])
            {            
                    move_uploaded_file($img_temp,"images/teacher_picture/".$new_name);
                    $Excutequery = mysqli_query($con, $sql);
                    // if (mysqli_query($con, $sql)) {
                        // $last_id = mysqli_insert_id($con);
                        // $subjectid = $_POST['subject'];
                        // $sql = "INSERT INTO teachersubjecttbl(subjectid,teachersid) VALUES ('$subjectid','$last_id')";
                        // $Excutequery = mysqli_query($con, $sql);
                        if ($Excutequery) {
                            $last_id = mysqli_insert_id($con);
                            $sectionid = $_POST['section'];
                            $sql = "INSERT INTO teachersectiontbl(sectionid,teachersid) VALUES ('$sectionid','$last_id')";
                            $Excutequery = mysqli_query($con, $sql);
                            if ($Excutequery) {
                                header("location: adminteachers.php?new=teacher");
                            }
                        } else {
                            header("location: adminteachers.php?addsubresult=failed");
                        }
            } 
         }
                    // }

}
if (isset($_POST['editteachersubmit'])) {
    /*
    $id = $_POST['hiddenuserid'];
    $email = $_POST['email'];
    $pword = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $deptid = $_POST['deptid'];
    $sectionid = $_POST['section'];
    */
    $id=mysqli_escape_string($con,$_POST['hiddenuserid']);
	$email=mysqli_escape_string($con,$_POST['email']);
	$pword=mysqli_escape_string($con,$_POST['password']);
	$fname=mysqli_escape_string($con,$_POST['fname']);
	$lname=mysqli_escape_string($con,$_POST['lname']);
	$mname=mysqli_escape_string($con,$_POST['mname']);
    $deptid=mysqli_escape_string($con,$_POST['deptid']);
    $sectionid=mysqli_escape_string($con,$_POST['section']);

    $select_img=mysqli_query($con,"SELECT image FROM teacherstbl WHERE teachersid='".$id."'");
    $fetch_img=mysqli_fetch_array($select_img);

    $image = $_FILES['image']['name'];
    $img_temp= $_FILES['image']['tmp_name'];
    $new_name = "(".rand().") ".$image;

    $sql = "UPDATE teacherstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',deptid='$deptid', image='$new_name' WHERE teachersid='$id' ";
    move_uploaded_file($img_temp,"images/teacher_picture/".$new_name);
    
    if (mysqli_query($con, $sql)) {
        //check if teacher has section assigned
        unlink("images/teacher_picture/".$fetch_img['image']); //delete na luma image
        $sql1 = "SELECT * FROM teachersectiontbl where teachersid='$id' ";
        $result=mysqli_query($con, $sql1);
        if(mysqli_num_rows($result)){
            $sql2 = "UPDATE teachersectiontbl SET sectionid='$sectionid' WHERE teachersid='$id' ";
            if (mysqli_query($con, $sql2)) {
                //header("location: adminteachers.php?editstudentresult=success&lname=" . $lname . "&fname=" . $fname);
                header("location: adminteachers.php?editstudentresult=success");
            } else {
                //header("location: adminteachers.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
                header("location: adminteachers.php?editstudentresult=failed");
            }
        }else{
            $sql3 = "INSERT INTO teachersectiontbl(sectionid, teachersid) VALUES ('$sectionid','$id')";
            if (mysqli_query($con, $sql3)) {
                header("location: adminteachers.php?editstudentresult=success&lname=" . $lname . "&fname=" . $fname);
            } else {
                header("location: adminteachers.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
            }
        }
    } else {
        //header("location: adminteachers.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
        header("location: adminteachers.php?editstudentresult=failed");
    }
}
