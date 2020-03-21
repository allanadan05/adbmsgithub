<?php
@session_start();
include('connection.php');


if (isset($_POST['addteachersubmit'])) {
    $email = $_POST['email'];
    $pword = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $deptid = $_POST['deptid'];

    $sql = "INSERT INTO teacherstbl(email,password,fname,lname,mname,deptid) VALUES ('$email','$pword','$fname','$lname','$mname','$deptid')";
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
                header("location: adminteachers.php?addsubresult=success");
            }
        } else {
            header("location: adminteachers.php?addsubresult=failed");
        }
    // }
}
if (isset($_POST['editteachersubmit'])) {
    $id = $_POST['hiddenuserid'];
    $email = $_POST['email'];
    $pword = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $deptid = $_POST['deptid'];
    $sectionid = $_POST['section'];

    $sql = "UPDATE teacherstbl SET email='$email' ,password='$pword', fname='$fname',lname='$lname',mname='$mname',deptid='$deptid' WHERE teachersid='$id' ";
    if (mysqli_query($con, $sql)) {

        //check if teacher has section assigned
        $sql1 = "SELECT * FROM teachersectiontbl where teachersid='$id' ";
        $result=mysqli_query($con, $sql1);
        if(mysqli_num_rows($result)){
            $sql2 = "UPDATE teachersectiontbl SET sectionid='$sectionid' WHERE teachersid='$id' ";
            if (mysqli_query($con, $sql2)) {
                header("location: adminteachers.php?editstudentresult=success&lname=" . $lname . "&fname=" . $fname);
            } else {
                header("location: adminteachers.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
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
        header("location: adminteachers.php?editstudentresult=failed&lname=".$lname."&fname=".$fname);
    }
}
