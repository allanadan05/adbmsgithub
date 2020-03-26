<?php
@session_start();
include('connection.php');
include('teachersession.php');
include('functions.php');

$_SESSION['sidebar']="settings";
$teacher=teachersgetname($teachersid);

if($_SESSION['access']=="teacher"){

}else{
    header("Location: index.php?login=access");
    exit();
}

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
                            <div>
                                <h2>Settings</h2>
                                <hr />
                            </div>
                            <?php
                            if(isset($_GET['password']) && $_GET['password']=="tooShort")
                            {
                                echo "<div class='alert alert-danger' role='alert'>Password must be more than 4 characters </div>";
                            }                                       
                            ?>
                            <div class="row">

                            <form action="process3.php" method="POST" enctype="multipart/form-data">
                            <?php                          
                                    $sqlteacherId_accSetting="SELECT * FROM teacherstbl WHERE teachersid='".$_SESSION['tearcherid']."'";
                                    $sqlteacherQuery_accSetting=mysqli_query($con,$sqlteacherId_accSetting);
                                    $sqlteacherFetch_accSetting=mysqli_fetch_array($sqlteacherQuery_accSetting);
                                    echo "<input type='hidden' name='teacherid' id='teacherid' value='$sqlteacherFetch_accSetting[teachersid]' readonly>";
                                    echo "<input type='hidden' name='accteacherSetting' id='accSetting' value='accSetting' readonly>";
                                    //echo "<pre>";
                                    //print_r($sqlteacherFetch_accSetting);
                                    
                            ?> 
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title"><a href=""> Account Setting</a></strong>
                                            </div>
                                                <div class="card-body">
                                                
                                                <input type="file" id="myfileTeacher" name="myfileTeacher" accept="image/*"><br>
                                                <strong>Username:</strong>&nbsp;
                                                <input type="email" name="email" id="email" value="<?php echo $sqlteacherFetch_accSetting["email"]?>"><br>
                                                <strong>Password:</strong>&nbsp;
                                                <input type="text" name="password" id="password" value="<?php echo $sqlteacherFetch_accSetting["password"]?>"><br><br>                                 
                                                </div>
                                                <div class="card-footer">
                                                <button name="accSetting_teacher" class="btn btn-warning" type="submit">SAVE</button><br> 
                                                </div>
                                        </div>
                                    </div>
                            </form>

                            <form action="process3.php" method="POST">
                                    <?php
                                    $sqlteacherId_personalInfo="SELECT * FROM teacherstbl WHERE teachersid='".$_SESSION['tearcherid']."'";
                                    $sqlteacherQuery_personalInfo=mysqli_query($con,$sqlteacherId_personalInfo);
                                    $sqlteacherFetch_personalInfo=mysqli_fetch_array($sqlteacherQuery_personalInfo);
                                    echo "<input type='hidden' name='teacheridInfo' id='teacheridInfo' value='$sqlteacherFetch_personalInfo[teachersid]' readonly>";
                                    echo "<input type='hidden' name='teacherpersonalInfo' id='personalInfo' value='personalInfo' readonly>";
                                    //echo "<pre>";
                                    //print_r($sqlteacherFetch_personalInfo);
                                    ?>            
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title"><a href=""> Personal Information</a></strong>
                                            </div>
                                                <div class="card-body"> 
                                                <strong>Lastname:</strong>&nbsp;
                                                <input type="text" name="lname_teacher" id="lname_teacher" value="<?php echo $sqlteacherFetch_personalInfo['lname'];?>"><br>
                                                <strong>Firstname:</strong>&nbsp;
                                                <input type="text" name="fname_teacher" id="fname_teacher" value="<?php echo $sqlteacherFetch_personalInfo['fname']; ?>"><br>
                                                <strong>Middlename:</strong>&nbsp; 
                                                <input type="text" name="mname_teacher" id="mname_teacher" value="<?php echo $sqlteacherFetch_personalInfo['mname']; ?>"><br><br>                                          
                                                </div>
                                                <div class="card-footer">
                                                <button name="teacher_personalInfo" class="btn btn-warning" type="submit">SAVE</button><br>
                                                
                                                </div>
                                        </div>
                                    </div>
                            </form>



                            </div> <!-- row -->
                        </div> <!-- section__content -->
                    </div><!-- container Fluid -->
                </div><!-- main content -->
                <!-- END MAIN CONTENT-->

                <!-- END PAGE CONTAINER-->
            </div>

        </div>

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