<?php
include('connection.php');
include('teachersession.php');
include('functions.php');
$_SESSION['sidebar']="dashboard";


$teacher=teachersgetname($teachersid);
$teacherdeptid=teachergetdeptid($teachersid);
?>

<!DOCTYPE html>
<php lang="en">
    

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Admin Admin">
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


    <script>
        function showone(){
        var cat = document.getElementById("select0").value;
        if(cat=="section"){
        document.getElementById("select1").style.display="inline";
        document.getElementById("select2").style.display="none";
        }else{
            document.getElementById("select1").style.display="none";
            document.getElementById("select2").style.display="inline";
        }
        }
    </script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE and SIDEBAR-->
        <?php include("teacherheadermobileandsidebar.php"); ?>
        <!-- HEADER MOBILE and SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include("teacherheader.php"); ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php 
                        /*
                            if(isset($_GET['login'])){
                                $login=$_GET['login'];
                                $name=$_GET['fname'];

                                if($login=="s"){
                                echo "<div class='alert alert-success' role='alert'> Welcome ". $name ."! </div>";
                                }
                            }
                            */
                            if(isset($_SESSION['fname']))
                            {
                                echo "<div class='alert alert-success' role='alert'> Welcome ". $_SESSION['fname'] ."! </div>";
                            }
                            ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Announcements </strong>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAnnouncement" style="float: right;">
                                           <i class="fas fa-plus"></i> ADD
                                        </button>
                                    </div>
                                    <div class="card-body">

                                    <hr/>
                                    <h4 style="color: #4272d7 ">Public Announcements</h4>
                                    <hr> 

                                    <?php
                                    $sql="SELECT * FROM announcementtbl WHERE deptid='$teacherdeptid' ORDER BY dateposted desc  ";
                                    $result=mysqli_query($con, $sql);

                                    if(mysqli_num_rows($result)){
                                    while($row = mysqli_fetch_array($result))
                                    { ?>
                                        <div style="background-color: whitesmoke;">
                                        <h4><?php echo $row['antitle']?><h4>
                                        <h6><?php echo $row['dateposted']?> | <?php echo $row['anfrom']?></h6>
                                        <p><?php echo $row['andetails'] ?></p>
                                        </div>
                                        <br>
                                    <?php }
                                    }
                                 ?>
                                 <hr/>
                                 <h4 style="color: #4272d7 ">Your Announcements</h4>
                                 <hr>    

                                 <?php


                                    $sql="SELECT * FROM announcementtbl WHERE anfrom='$teacher' ORDER BY dateposted desc  ";
                                    $result=mysqli_query($con, $sql);

                                    if(mysqli_num_rows($result)){
                                    while($row = mysqli_fetch_array($result))
                                    { ?>
                                        <div style="background-color: whitesmoke;">
                                        <h4><?php echo $row['antitle']?><h4>
                                        <h6><?php echo $row['dateposted']?> | <?php echo $row['anfrom']?></h6>
                                        <p><?php echo $row['andetails'] ?></p>
                                        </div>
                                        <br>
                                    <?php }
                                    }
                                 ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Profile Card</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" style="width:50%;" src="images/icon/avatar-dan.jpg" alt="Card image cap">
                                            <h5 class="text-sm-center mt-2 mb-1"><?php echo teachersgetname($teachersid);?></h5>
                                            <!-- <div class="location text-sm-center">
                                                <i class="fa fa-groups"></i>Section: BSIT-3B1</div> -->
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <a href="#">
                                                <i class="fa fa-facebook pr-1"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-twitter pr-1"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-linkedin pr-1"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-pinterest pr-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong id="accountinfo">Account</strong> Information
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form">
                                            
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Userid</label><br>
                                                <input type="text" id="name" placeholder="" required="" value=<?php echo teacherid($teachersid);?> readonly class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail2" class="px-1  form-control-label">FirstName</label><br>
                                                <input type="email" id="email" placeholder="" required="" value=<?php echo teachergetfname($teachersid);?> readonly class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Lastname</label><br>
                                                <input type="text" id="name" placeholder="" required="" value=<?php echo teachergetlname($teachersid);?> readonly class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail2" class="px-1  form-control-label">Middlename</label><br>
                                                <input type="email" id="email" placeholder="" required="" value=<?php echo teachergetmname($teachersid);?> readonly class="form-control">
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="edit" class="btn btn-secondary btn-sm">
                                            <i class="fa fa-pencil-square-o"></i> Edit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Dan Astillero. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


    <!-- MODALs Here -->

    <!-- modal medium -->
    <div class="modal fade" id="addAnnouncement" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <form action="announcement.php" method="POST">
                    <h5 class="modal-title" id="mediumModalLabel"><input type="text" name="antitle" placeholder="Type title announcement here..." style="width: 500px"></h5>
                </div>
                <div class="modal-body">
                <textarea rows="5" cols="90" name="andetails" placeholder="Type your message here..."></textarea>
                <hr/>    
                <Label for="anfrom">From:  </Label> &nbsp <input type="text" name="anfrom" value="<?php echo teachersgetname($teachersid);?>" style="display:inline; color: grey;" readonly>
                <input type="date" name="dateposted" value="<?php echo date('Y-m-d'); ?>" style="display:inline; color: grey;" readonly />
                </div>
                <div class="modal-footer">
                    
                    <select name="sectionid" id="select0" onchange="showone()">
                    <option value="section">Per Section</option>
                    <option value="subject">Per Subject</option>
                    </select>
                    <select name="sectionid" id="select1" style="display:none;" >
                    <option value="" selected disabled>--Choose Section--</option>
                    <?php 
                    $category="sections";
                    if($category=="sections"){
                        $sql="select * from sectiontbl";
                        $result=mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_array($result))
                            { 
                    ?>
                                <option value="<?php echo $row['sectionid'];  ?>"><?php echo $row['sectionname'];  ?></option>

                    <?php
                            }
                        }
                    }
                    ?>
                    </select>

                    <select name="subjectid" id="select2" style="display:none;">
                    <option value="" selected disabled>--Per Subject--</option>
                    <?php 
                    $category="subject";
                    if($category=="subject"){
                        $sql="select * from subjecttbl";
                        $result=mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_array($result))
                            { 
                    ?>
                                <option value="<?php echo $row['subjectid'];  ?>"><?php echo $row['subjectname'];  ?></option>

                    <?php
                            }
                        }
                    }
                    ?>

                    </select>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="addAnnPerSubOrSec" class="btn btn-primary" >Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal medium -->

            <script>
         
            
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
