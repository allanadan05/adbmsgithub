<?php
include('connection.php');


if(isset($_POST["addlesson"])){

    $fm = $_FILES["lessonpdf"]["name"];
    $loc = "./uploads/".$fm;
    move_uploaded_file($_FILES["lessonpdf"]["tmp_name"],$loc);
    

    $lessontitle=$_POST['lessontitle'];
    $lessondetail=$_POST['lessondetail']; 
    $subjectid=$_POST['subjectid'];
    $sql = "INSERT INTO lessontbl(lessontitle,lessondetail,lessonpdf,subjectid) VALUES ('$lessontitle','$lessondetail','$loc','$subjectid')";
    $Excutequery=mysqli_query($con,$sql);
    if($Excutequery)
        {
           
            echo "<script>alert('Uploaded successfully!')</script>";
            header("location: adminlessons.php?addsubresult=success");
        }
        else
        {
           
            header("location: adminlessons.php?addsubresult=success");
            
        }
}


if(isset($_POST['editnewlesson'])){
    
    $subjectid=$_POST['subjectid'];
    $lessontitle=$_POST['lessontitle'];
    $lessondetail=$_POST['lessondetail'];
    $id=$_POST['uId'];

    $fm = $_FILES["lessonpdf"]["name"];
    $loc = "./uploads/".$fm;
    if(file_exists($loc)){

        $q = "UPDATE lessontbl SET lessontitle='$lessontitle', lessondetail='$lessondetail', subjectid='$subjectid' WHERE lessonid='$id' ";
        $u = mysqli_query($con , $q);
        if($u)
            {
                header("location: adminlessons.php?editlessonresult=success&lessontit=".$lessontit);
            }
            else
            {
                header("location: adminlessons.php?editlessonresult=failed&lessondet=".$lessondet);
            }
        
        
    }else{
        
        move_uploaded_file($_FILES["lessonpdf"]["tmp_name"],$loc);
     
        $q = "UPDATE lessontbl SET lessontitle='$lessontitle', lessondetail='$lessondetail', subjectid='$subjectid', lessonpdf='$loc' WHERE lessonid='$id' ";
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