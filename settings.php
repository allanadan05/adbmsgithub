<?php 
@session_start();
include('connection.php');
include('session.php');

if($_SESSION['access']=="user"){

}else{
    header("Location: index.php?login=access");
    exit();
}


$_SESSION['sidebar']="settings";
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
                                    $sqlUserId_accSetting="SELECT * FROM userstbl WHERE userid='".$_SESSION['id']."'";
                                    $sqlUserQuery_accSetting=mysqli_query($con,$sqlUserId_accSetting);
                                    $sqlUserFetch_accSetting=mysqli_fetch_array($sqlUserQuery_accSetting);
                                    echo "<input type='hidden' name='userid' id='userid' value='$sqlUserFetch_accSetting[userid]' readonly>";
                                    echo "<input type='hidden' name='accuserSetting' id='accuserSetting' value='accSetting' readonly>";
                                    //echo "<pre>";
                                    //print_r($sqlUserFetch_accSetting);
                                    
                            ?> 
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title"><a href=""> Account Setting</a></strong>
                                            </div>
                                                <div class="card-body">
                                                
                                                <input type="file" id="myfileUser" name="myfileUser" accept="image/*"><br>
                                                <strong>Username:</strong>&nbsp;
                                                <input type="email" name="email_user" id="email_user" value="<?php echo $sqlUserFetch_accSetting["email"]?>"><br>
                                                <strong>Password:</strong>&nbsp;
                                                <input type="text" name="password_user" id="password_user" value="<?php echo $sqlUserFetch_accSetting["password"]?>"><br><br>                                 
                                                </div>
                                                <div class="card-footer">
                                                <button name="accSetting_user" class="btn btn-warning" type="submit">SAVE</button><br> 
                                                </div>
                                        </div>
                                    </div>
                            </form>
                            <form action="process3.php" method="POST">
                                    <?php
                                    $sqlUserId_personalInfo="SELECT * FROM userstbl WHERE userid='".$_SESSION['id']."'";
                                    $sqlUserQuery_personalInfo=mysqli_query($con,$sqlUserId_personalInfo);
                                    $sqlUserFetch_personalInfo=mysqli_fetch_array($sqlUserQuery_personalInfo);
                                    echo "<input type='hidden' name='useridInfo' id='useridInfo' value='$sqlUserFetch_personalInfo[userid]' readonly>";
                                    echo "<input type='hidden' name='personalInfouser' id='personalInfo' value='personalInfo' readonly>";
                                    //echo "<pre>";
                                    //print_r($sqlUserFetch_personalInfo);
                                    ?>            
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title"><a href=""> Personal Information</a></strong>
                                            </div>
                                                <div class="card-body"> 
                                                <strong>Lastname:</strong>&nbsp;
                                                <input type="text" name="lname_user" id="lname_user" value="<?php echo $sqlUserFetch_personalInfo['lname'];?>"><br>
                                                <strong>Firstname:</strong>&nbsp;
                                                <input type="text" name="fname_user" id="fname_user" value="<?php echo $sqlUserFetch_personalInfo['fname']; ?>"><br>
                                                <strong>Middlename:</strong>&nbsp; 
                                                <input type="text" name="mname_user" id="mname_user" value="<?php echo $sqlUserFetch_personalInfo['mname']; ?>"><br><br>                                          
                                                </div>
                                                <div class="card-footer">
                                                <button name="personalInfo_user" class="btn btn-warning" type="submit">SAVE</button><br>
                                                
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