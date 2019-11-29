<?php
include('connection.php');

    $subname=$_POST['subjectname'];
    $subdesc=$_POST['subjectdesc'];
    
    
    
    
    $sql = "INSERT INTO subjecttbl(subjectname,subjectdesc) VALUES ('$subname','$subdesc')";
    if(mysqli_query($con,$sql))
        {
            header("location: adminsubjects.php");
        }
        else
        {
            echo " ERROR ";
        }

?>