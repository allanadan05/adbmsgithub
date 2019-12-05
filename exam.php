<?php 

include('connection.php');
include('adminsession.php');
include('functions.php');


?>

<!DOCTYPE html>
<html lang="en">

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
                                <?php
                                    if(isset($_GET['quizid'])){
                                    $id=$_GET['quizid'];
                                    $qq = "select quizid, quizname, (SELECT subjectname FROM subjecttbl WHERE subjectid=quiztbl.subjectid) AS subjectname, duration, status FROM quiztbl WHERE quizid='$id' ";
                                    $ee = mysqli_query($con, $qq);
                                    while($rr = mysqli_fetch_array($ee)){
                                
                                ?>
                                <h2><?php echo "Quiz: " .$rr['quizname'];  ?></h2><hr/>
                                <p><?php echo "Subject: " .$rr['subjectname'];   ?></p>
                                <p><?php echo "Duration: " .$rr['duration'];  ?></p><br/>
                                <?php } } ?> 
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                if($rr['status']=="ACTIVATED"){
                                for($x=1; $x<=10; $x++) { 

                                ?>
                                <div class="card border border-primary">
                                    <div class="card-header">
                                        <strong class="card-title">Question #<?php echo $x; ?> of 10</strong>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">What is the full name of the Philippine national heroe?
                                        </p>
                                        <br/>
                                        <div class="row form-group">
                                                <div class="col col-md-2">
                                                    
                                                </div>
                                                <div class="col col-md-8">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Option 1
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Option 2
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio3" class="form-check-label ">
                                                                <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Option 3
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio4" class="form-check-label ">
                                                                <input type="radio" id="radio4" name="radios" value="option4" class="form-check-input">Option 4
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <?php } }?>
                            </div>

                        </div> <!-- row -->

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"> 
                                <!-- 
                                <button class="btn btn-primary">Back</button>
                                <button class="btn btn-primary">Next</button>
                                 -->
                                <button class="btn btn-success">Submit</button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

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

</html>
<!-- end document-->
