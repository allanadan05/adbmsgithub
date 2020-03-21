<?php
@session_start();
include('connection.php');

    $sec=$_POST['sectionname'];
    
    
    
    
    $sql = "INSERT INTO sectiontbl(sectionname) VALUES ('$sec')";
    if(mysqli_query($con,$sql))
        {
            header("location: adminsections.php");
        }
        else
        {
            echo " ERROR ";
        }

?>