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
?>