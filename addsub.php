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


if(isset($_POST['assignsubject'])){
    $id=$_POST['hiddensendid'];
    $subjectid=$_POST['subject'];
    $sql="INSERT INTO teachersubjecttbl(teachersid,subjectid) VALUES ('$id','$subjectid')";
    if(mysqli_query($con,$sql))
    {   
        header("location: adminteachers.php?addsubresult=success");
    }
    
    else
    {
        header("location: adminteachers.php?addsubresult=failed");
    }

}

if(isset($_POST['assignsectiontosubject'])){
    $sectionid=$_POST['sectionid'];
    $subjectid=$_POST['subjectid'];
    $sql="INSERT INTO sectionsubjecttbl(sectionid,subjectid) VALUES ('$sectionid','$subjectid')";
    if(mysqli_query($con,$sql))
    {   
        // header("location: adminsubject.php?assignsubresult=success");
    }
    
    else
    {
        // header("location: adminsubject.php?assignsubresult=failed");
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



if(isset($_GET['deletesubject'])){
    $id=$_GET['id'];
     
   $q = "DELETE FROM subjecttbl WHERE subjectid='$id' ";
   $u = mysqli_query($con , $q);
    if($u)
        {
            header("location: adminsubjects.php?deletesubresult=success");
        }
        else
        {
            header("location: adminsubjects.php?deletesubresult=failed");
        }
}



?>