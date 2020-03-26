<?php
include('connection.php');
include('adminsession.php');
include('functions.php');
$_SESSION['sidebar']="settings";

if($_SESSION['access']=="admin"){

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
            <?php include("adminheadermobileandsidebar.php"); ?>
            <!-- HEADER MOBILE and SIDEBAR-->

         <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <?php include("adminheader.php"); ?>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div>
                                <h2>Settings</h2>
                                <hr />
                            </div>

                            <div class="row">
                            <form action="process3.php" method="POST" enctype="multipart/form-data">
                            <?php
                                    $sqlAdminId_accSetting="SELECT * FROM admintbl WHERE adminid='".$_SESSION['id']."'";
                                    $sqlAdminQuery_accSetting=mysqli_query($con,$sqlAdminId_accSetting);
                                    $sqlAdminFetch_accSetting=mysqli_fetch_array($sqlAdminQuery_accSetting);
                                    echo "<input type='hidden' name='adminid' id='adminid' value='$sqlAdminFetch_accSetting[adminid]' readonly>";
                                    echo "<input type='hidden' name='accSetting' id='accSetting' value='accSetting' readonly>";
                                    //var_dump($sqlAdminFetch);
                            ?> 
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title"><a href=""> Account Setting</a></strong>
                                            </div>
                                                <div class="card-body">
                                                
                                                <input type="file" id="myfile" name="myfile" accept="image/*"><br>
                                                <strong>Username:</strong>&nbsp;
                                                <input type="email" name="email" id="email" value="<?php echo $sqlAdminFetch_accSetting['email']; ?>"><br>
                                                <strong>Password:</strong>&nbsp;
                                                <input type="password" name="password" id="password" value="<?php echo $sqlAdminFetch_accSetting['password']; ?>"><br><br>                                 
                                                </div>
                                           
                                                <div class="card-footer">
                                                <button name="accSetting" class="btn btn-warning" type="submit">SAVE</button><br> 
                                                </div>
                                        </div>
                                    </div>
                            </form>
                            <form action="process3.php" method="POST">
                                    <?php
                                    $sqlAdminId_personalInfo="SELECT * FROM admintbl WHERE adminid='".$_SESSION['id']."'";
                                    $sqlAdminQuery_personalInfo=mysqli_query($con,$sqlAdminId_personalInfo);
                                    $sqlAdminFetch_personalInfo=mysqli_fetch_array($sqlAdminQuery_personalInfo);
                                    echo "<input type='hidden' name='adminid' id='adminid' value='$sqlAdminFetch_personalInfo[adminid]' readonly>";
                                    echo "<input type='hidden' name='personalInfo' id='personalInfo' value='personalInfo' readonly>";
                                    //var_dump($sqlAdminFetch);
                                    
                                    ?>            
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title"><a href=""> Personal Information</a></strong>
                                            </div>
                                                <div class="card-body"> 
                                                <strong>Lastname:</strong>&nbsp;
                                                <input type="text" name="lname" id="lname" value="<?php echo $sqlAdminFetch_personalInfo['lname'];?>"><br>
                                                <strong>Firstname:</strong>&nbsp;
                                                <input type="text" name="fname" id="fname" value="<?php echo $sqlAdminFetch_personalInfo['fname']; ?>"><br>
                                                <strong>Middlename:</strong>&nbsp; 
                                                <input type="text" name="mname" id="mname" value="<?php echo $sqlAdminFetch_personalInfo['mname']; ?>"><br><br>                                          
                                                </div>
                                                <div class="card-footer">
                                                <button name="personalInfo" class="btn btn-warning" type="submit">SAVE</button><br>
                                                
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