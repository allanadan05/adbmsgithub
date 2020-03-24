<?php
session_start();
include('connection.php');


if(isset($_POST["addlesson"])){
    
    $fm = rand()." ".$_FILES["lessonpdf"]["name"];
    $loc = "./uploads/".$fm;

    //this function can accept only in PDF po hihi
    $allow=array("pdf"); // this use diffrent file format niya po
    //$temp=explode(".",$_FILES["lessonpdf"]["name"]);
    $temp = explode(".",$fm);
    $extension=end($temp); // find pdf file only .. from $array('pdf');
    $upload_file=$_FILES["lessonpdf"]["name"];
    $pdfOnly=pathinfo($upload_file, PATHINFO_EXTENSION);
    if(!in_array($pdfOnly, $allow))
    {
                //echo "<script>alert('File is allow only in PDF')</script>";
                $_SESSION['only_upload_pdf']=$fm;
                if($_SESSION['access']=="user"){
                    header("Location: index.php?login=access"); //user cant access this
                }else if($_SESSION['access']=="teacher"){
                    header("location: teacherlessons.php");
                }else if($_SESSION['access']=="admin"){
                    header("location: adminlessons.php");
                }else{
                    header("Location: index.php?login=access");
                }
    }
    else
    {
            if(file_exists($loc))
            {
                //echo "<script>alert('Already uploaded PDF File')</script>";
                $_SESSION['exist_upload_pdf']=$fm;
                if($_SESSION['exist_upload_pdf'])
                {
                    if($_SESSION['access']=="user"){
                        header("Location: index.php?login=access"); //user cant access this
                    }else if($_SESSION['access']=="teacher"){
                        header("location: teacherlessons.php");
                    }else if($_SESSION['access']=="admin"){
                        header("location: adminlessons.php");
                    }else{
                        header("Location: index.php?login=access");
                    }
                    
                }
                //header("location: adminlessons.php?already=exist");
            }
            else
            {
                
                move_uploaded_file($_FILES["lessonpdf"]["tmp_name"],$loc);
                //move_uploaded_file($_FILES["lessonpdf"]["tmp_name"],"..uploads/".$_FILES["lessonpdf"]["name"]); 
                $lessontitle=$_POST['lessontitle'];
                $lessondetail=$_POST['lessondetail']; 
                $subjectid=$_POST['subjectid'];
                $sql = "INSERT INTO lessontbl(lessontitle,lessondetail,lessonpdf,subjectid) VALUES ('$lessontitle','$lessondetail','$loc','$subjectid')";
                //$sql = "INSERT INTO lessontbl(lessontitle,lessondetail,lessonpdf,subjectid) VALUES ('$lessontitle','$lessondetail','$upload_file','$subjectid')";
                $Excutequery=mysqli_query($con,$sql);
                if($Excutequery)
                    {
                        $_SESSION['success_upload_pdf']=$fm;
                        if($_SESSION['success_upload_pdf'])
                        {
                            if($_SESSION['access']=="user"){
                                header("Location: index.php?login=access"); //user cant access this
                            }else if($_SESSION['access']=="teacher"){
                                header("location: teacherlessons.php");
                            }else if($_SESSION['access']=="admin"){
                                header("location: adminlessons.php");
                            }else{
                                header("Location: index.php?login=access");
                            }
                        }
                        //echo "<script>alert('Uploaded successfully!')</script>";
                        //header("location: adminlessons.php?addsubresult=success");
                    }
                    else
                    {
                        if($_SESSION['failed_upload_pdf'])
                        {
                            if($_SESSION['access']=="user"){
                                header("Location: index.php?login=access"); //user cant access this
                            }else if($_SESSION['access']=="teacher"){
                                header("location: teacherlessons.php");
                            }else if($_SESSION['access']=="admin"){
                                header("location: adminlessons.php");
                            }else{
                                header("Location: index.php?login=access");
                            }
                        }
                        //header("location: adminlessons.php?addsubresult=failed");   
                    }
            }
    }
}


if(isset($_POST['editnewlesson'])){

    //this function can accept only in PDF po hihi
    $allow=array("pdf"); // this use diffrent file format niya po
    //$temp=explode(".",$_FILES["lessonpdf"]["name"]);
    $temp = explode(".",$fm);
    $extension=end($temp); // find pdf file only .. from $array('pdf');
    $upload_file=$_FILES["lessonpdf"]["name"];
    $pdfOnly=pathinfo($upload_file, PATHINFO_EXTENSION);    

    $fm = rand()." ".$_FILES["lessonpdf"]["name"];
    $loc = "./uploads/".$fm;
    
    $subjectid=$_POST['subjectid'];
    $lessontitle=$_POST['lessontitle'];
    $lessondetail=$_POST['lessondetail'];
    $id=$_POST['uId'];

    $select_pdf=mysqli_query($con,"SELECT lessonpdf FROM lessontbl WHERE lessonid='".$id."'");
    $fetch_pdf=mysqli_fetch_array($select_pdf);

    if(!in_array($pdfOnly,$allow))
    {
                //echo "<script>alert('File is allow only in PDF')</script>";
                $_SESSION['only_upload_pdf']=$fm;
                if($_SESSION['access']=="user"){
                    header("Location: index.php?login=access"); //user cant access this
                }else if($_SESSION['access']=="teacher"){
                    header("location: teacherlessons.php");
                }else if($_SESSION['access']=="admin"){
                    header("location: adminlessons.php");
                }else{
                    header("Location: index.php?login=access");
                }
    }
    else
    {

                if(file_exists($loc)){

                    $_SESSION['exist_upload_pdf']=$fm;
                    if($_SESSION['exist_upload_pdf'])
                    {
                        if($_SESSION['access']=="user"){
                            header("Location: index.php?login=access"); //user cant access this
                        }else if($_SESSION['access']=="teacher"){
                            header("location: teacherlessons.php");
                        }else if($_SESSION['access']=="admin"){
                            header("location: adminlessons.php");
                        }else{
                            header("Location: index.php?login=access");
                        }
                    }
                    
                }else{
                    
                    unlink($fetch_pdf['lessonpdf']);
                    move_uploaded_file($_FILES["lessonpdf"]["tmp_name"],$loc);
                    
                    $q = "UPDATE lessontbl SET lessontitle='$lessontitle', lessondetail='$lessondetail', subjectid='$subjectid', lessonpdf='$loc' WHERE lessonid='$id' ";
                    $u = mysqli_query($con , $q);
                    if($u)
                        {
                            if($_SESSION['access']=="user"){
                                header("Location: index.php?login=access"); //user cant access this
                            }else if($_SESSION['access']=="teacher"){
                                header("location: teacherlessons.php?editlessonresult=success&lessontitle=".$lessontitle);
                            }else if($_SESSION['access']=="admin"){
                                header("location: adminlessons.php?editlessonresult=success&lessontitle=".$lessontitle);
                            }else{
                                header("Location: index.php?login=access");
                            }
                            
                        }
                        else
                        {
                            if($_SESSION['access']=="user"){
                                header("Location: index.php?login=access"); //user cant access this
                            }else if($_SESSION['access']=="teacher"){
                                header("location: teacherlessons.php?editlessonresult=failed&lessontitle=".$lessontitle);
                            }else if($_SESSION['access']=="admin"){
                                header("location: adminlessons.php?editlessonresult=failed&lessontitle=".$lessontitle);
                            }else{
                                header("Location: index.php?login=access");
                            }
                        }
                }
    }
}

if(isset($_GET['deletelesson']))
{
    $id=$_GET['id'];
    $select_pdf=mysqli_query($con,"SELECT lessonpdf FROM lessontbl WHERE lessonid='".$id."'");
    $fetch_pdf=mysqli_fetch_array($select_pdf);
    unlink($fetch_pdf['lessonpdf']); //delete na luma image
    $q = "DELETE FROM lessontbl WHERE lessonid='$id' ";
    $u = mysqli_query($con , $q);
    if($u)
        {
            if($_SESSION['access']=="user"){
                header("Location: index.php?login=access"); //user cant access this
            }else if($_SESSION['access']=="teacher"){
                header("location: teacherlessons.php?deletesubresult=success");
            }else if($_SESSION['access']=="admin"){
                header("location: adminlessons.php?deletesubresult=success");
            }else{
                header("Location: index.php?login=access");
            }
            
        }
        else
        {
            if($_SESSION['access']=="user"){
                header("Location: index.php?login=access"); //user cant access this
            }else if($_SESSION['access']=="teacher"){
                header("location: teacherlessons.php?deletesubresult=failed");
            }else if($_SESSION['access']=="admin"){
                header("location: adminlessons.php?deletesubresult=failed");
            }else{
                header("Location: index.php?login=access");
            }
        }
}



?>