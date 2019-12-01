<?php
include('connection.php');


if(isset($_POST['addlesson'])){
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
}


if(isset($_POST['editnewlesson'])){
    $lessontit=$_POST['lessontitle'];
    $lessondet=$_POST['lessondetail'];
    $id=$_POST['uId'];
     
   $q = "UPDATE lessontbl SET lessontitle='$lessontit', lessondetail='$lessondet' WHERE lessonid='$id' ";
   $u = mysqli_query($con , $q);
    if($u)
        {
            header("location: adminlessons.php?editlessonresult=success&lessontit=".$lessontit);
        }
        else
        {
            header("location: adminlessons.php?editlessonresult=failed&lessondet=".$lessondet);
        }
}

if(isset($_GET['deletelesson'])){
    $id=$_GET['id'];
     
   $q = "DELETE FROM lessontbl WHERE lessonid='$id' ";
   $u = mysqli_query($con , $q);
    if($u)
        {
            header("location: adminlessons.php?deletesubresult=success");
        }
        else
        {
            header("location: adminlessons.php?deletesubresult=failed");
        }
}



?>