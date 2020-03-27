<?php
include('connection.php');
include('session.php');
include('functions.php');
$_SESSION['sidebar']="subjects";

if($_SESSION['access']=="user"){

}else{
    header("Location: index.php?login=access");
    exit();
}

$id=$_SESSION['userid'];
?>
<!DOCTYPE html>
<php lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Dan Astillero">
        <!-- Title Page-->
        <title>Dashboard</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <?php include("studentheaderandmobileview.php"); ?>

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <?php include("studentheader.php"); ?>

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div>
                                <h2>Subjects</h2>
                                <hr /><br />
                            </div>
                            <div class="row">
                            <?php 
                             $count=0;
                            $sql="select *, (select subjectid from subjecttbl where subjectid=sectionsubjecttbl.subjectid) as subjectid, (select subjectname from subjecttbl where subjectid=sectionsubjecttbl.subjectid) as subjectname, (select subjectdesc from subjecttbl where subjectid=sectionsubjecttbl.subjectid) as subjectdesc from sectionsubjecttbl where sectionid=(select sectionid from userstbl where userid='$id')";
                            $result=mysqli_query($con, $sql);
                            while($row=mysqli_fetch_array($result)){
                            $count=$count+1;
                            ?>
                                <div class="col-md-6">
                                    <div class="card border border-primary">
                                        <div class="card-header">
                                            <strong class="card-title"><a href="#"><?php echo $row['subjectname']?></a>
                                                
                                            </strong>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"><?php echo $row['subjectdesc']?>
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <p style="color:maroon; font-weight:bold; font-size:20px;"><button id="showbtn<?php echo $count; ?>" onclick="showhide(<?php echo $count; ?>)" class="btn btn-outline-primary"><i class="fa fa-caret-down"></i> Show </button> &nbsp Lessons:</p><br>
                                            
                                            <div style="display:none;" id="lessonsdiv<?php echo $count;?>">
                                            <?php 
                                            $s="select * from lessontbl where subjectid=".$row['subjectid']." order by lessontitle";
                                            $r=mysqli_query($con, $s);

                                            if(mysqli_num_rows($r)){
                                            while($lesson = mysqli_fetch_array($r))
                                            { ?>
                                                
                                                    <div  class="card card border border-default">
                                                        <div class="card-header" style="background:white; color:black;">
                                                            <p> <b> <?php  echo "<td>".$lesson['lessontitle']."</td>"; ?> </b></p>
                                                            
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text"> <?php  echo "<td>".$lesson['lessondetail']."</td>"; ?>
                                                            </p>

                                                            <a style="color:maroon; font-size: 12px;"
                                                                    href="<?php  echo $lesson['lessonpdf']; ?>"><i
                                                                        class="fas fa-file-pdf-o"></i> Open </a>
                                                                &nbsp | &nbsp
                                                                <a style="color:maroon; font-size: 12px;"
                                                                    href="<?php  echo $lesson['lessonpdf']; ?>" target="_blank"
                                                                    type="application/octet-stream"
                                                                    download="<?php echo $lesson['lessontitle']; ?>"><i
                                                                        class="fas fa-download"></i>Download </a>  
                                                        </div>
                                                        
                                                    </div>
                                                <?php
                                                }
                                                }else{
                                                    echo '<p style="background:white; color:grey;">
                                                    No lesson yet
                                                    </p>';
                                                }
                                                ?>
                                                </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <?php 
                            
                             }?>

                            </div> <!-- row -->
                        </div> <!-- section__content -->
                    </div><!-- container Fluid -->
                </div><!-- main content -->
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>

        <script>

        function showhide(count){
            var x=document.getElementById("lessonsdiv"+count);
            var y=document.getElementById("showbtn"+count);
            if(x.style.display==="none"){
                x.style.display="block";
                y.innerHTML='<i class="fa fa-caret-up"></i> Hide';
            }else{
                x.style.display="none";
                y.innerHTML='<i class="fa fa-caret-down"></i> Show';
            }
        }

        </script>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

</php>
<!-- end document-->