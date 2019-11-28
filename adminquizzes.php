<?php
include('connection.php');
include('adminsession.php');
include('functions.php');



?>
<!DOCTYPE html>
<php lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Dan Astillero">
    <!-- Title Page-->
    <title>Student Dashboard</title>

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
                                <h2>Quizzes</h2><hr/>
                            </div>
                        <div class="row">
                           
                             <div class="col-md-12">
                                <div class="card border border-primary">
                                    <div class="card-header">
                                        <div class="row">
                                        <strong class="card-title">Question for </strong>  &nbsp &nbsp
                                        <select class="js-select2" name="property">
                                                <option selected="selected">Mathematics</option>
                                                <option value="">Science</option>
                                                <option value="">Physics</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                        </div>
                                        Time Limit: &nbsp &nbsp <input type="time" name="time">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><input type="text" name="question" placeholder="Enter question here..." style="width:100%">
                                        </p>
                                        <br/>
                                        <div class="row form-group">
                                                <div class="col col-md-2">
                                                    
                                                </div>
                                                <div class="col col-md-8">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input"><input type="text" name="optiona" placeholder="Enter choice A" style="width:50%">
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input"><input type="text" name="optionb" placeholder="Enter choice B" style="width:50%">
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio3" class="form-check-label ">
                                                                <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input"><input type="text" name="optionc" placeholder="Enter choice C" style="width:50%">
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio4" class="form-check-label ">
                                                                <input type="radio" id="radio4" name="radios" value="option4" class="form-check-input"><input type="text" name="optiond" placeholder="Enter choice D" style="width:50%">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

                            <div class="col-md-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Quiz Title</th>
                                                <th>Subject</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Quiz 1.1</td>
                                                <td>Mathematics</td>
                                                <td>10 mins</td>
                                                <td style="color: red;">Deactivated <i class="fas fa-link"></i>
                                                    <label class="switch switch-3d switch-danger mr-3">
                                                      <input type="checkbox" class="switch-input" checked="true">
                                                      <span class="switch-label"></span>
                                                      <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quiz 1.1</td>
                                                <td>Mathematics</td>
                                                <td>10 mins</td>
                                                <td style="color: green;">Active <i class="fas fa-link"></i>
                                                    <label class="switch switch-3d switch-success mr-3">
                                                      <input type="checkbox" class="switch-input" checked="true">
                                                      <span class="switch-label"></span>
                                                      <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quiz 1.1</td>
                                                <td>Mathematics</td>
                                                <td>10 mins</td>
                                                <td style="color: red;">Deactivated <i class="fas fa-link"></i>
                                                    <label class="switch switch-3d switch-danger mr-3">
                                                      <input type="checkbox" class="switch-input" checked="true">
                                                      <span class="switch-label"></span>
                                                      <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quiz 1.1</td>
                                                <td>Mathematics</td>
                                                <td>10 mins</td>
                                                <td style="color: green;">Active <i class="fas fa-link"></i>
                                                    <label class="switch switch-3d switch-success mr-3">
                                                      <input type="checkbox" class="switch-input" checked="true">
                                                      <span class="switch-label"></span>
                                                      <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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
