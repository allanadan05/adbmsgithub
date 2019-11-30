<?php
include('connection.php');

    $lessontitle=$_POST['lessontitle'];
    $lessondetail=$_POST['lessondetail'];
    $subjectid=$_POST['subjectid'];
    $upload_file=$_FILES['lessonpdf']['name'];


   
    
     
    $sql = "INSERT INTO lessontbl(lessontitle,lessondetail,lessonpdf,subjectid) VALUES ('$lessontitle','$lessondetail','$upload_file','$subjectid')";
    if(mysqli_query($con,$sql))
        {
            
            move_uploaded_file($_FILES['lessonpdf']['tmp_name'],"images/".$_FILES['lessonpdf']['name']);
            echo "<script>alert('upload successfully!')</script>";
            header("location: adminlessons.php?addsubresult=success");
        }
        else
        {
           
            header("location: adminlessons.php?addsubresult=success");
            
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