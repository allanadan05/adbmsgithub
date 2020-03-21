<?php
@session_start();
include('connection.php');

    $sdept=$_POST['departmentname'];
    
    
    
    
    $sql = "INSERT INTO departmenttbl(departmentname) VALUES ('$sdept')";
    if(mysqli_query($con,$sql))
        {
            header("location: adminsections.php");
        }
        else
        {
            echo " ERROR ";
        }

?>