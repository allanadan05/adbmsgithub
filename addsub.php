<?php
include('connection.php');

if(isset($_POST['submitnewsubject'])){
    $subname=$_POST['subjectname'];
    $subdesc=$_POST['subjectdesc'];
     
    $sql = "INSERT INTO subjecttbl(subjectname,subjectdesc) VALUES ('$subname','$subdesc')";
    if(mysqli_query($con,$sql))
        {
            header("location: adminsubjects.php?addsubresult=success");
        }
        else
        {
            header("location: adminsubjects.php?addsubresult=failed");
        }
}

if(isset($_POST['editnewsubject'])){
    $subname=$_POST['subjectname'];
    $subdesc=$_POST['subjectdesc'];
    $id=$_POST['uId'];
     
   $q = "UPDATE subjecttbl SET subjectname='$subname', subjectdesc='$subdesc' WHERE subjectid='$id' ";
   $u = mysqli_query($con , $q);
    if($u)
        {
            header("location: adminsubjects.php?editsubresult=success&subname=".$subname);
        }
        else
        {
            header("location: adminsubjects.php?editsubresult=failed&subname=".$subname);
        }
}

if(isset($GET['deletesubject'])){
    $subname=$_POST['subjectname'];
    $subdesc=$_POST['subjectdesc'];
    $id=$_POST['uId'];
     
   $q = "UPDATE subjecttbl SET subjectname='$subname', subjectdesc='$subdesc' WHERE subjectid='$id' ";
   $u = mysqli_query($con , $q);
    if($u)
        {
            header("location: adminsubjects.php?editsubresult=success&subname=".$subname);
        }
        else
        {
            header("location: adminsubjects.php?editsubresult=failed&subname=".$subname);
        }
}



?>