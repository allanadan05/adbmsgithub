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
        
        <?php include("studentheaderandmobileview.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php include("studentheader.php"); ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <!-- ANNOUNCEMENTS -->
                        <div class="row">
                            <div class="col-md-8">

                                <!-- ANOUNCEMENTS -->
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Announcements</strong>
                                    </div>
                                    <div class="card-body">
                                        <div style="background-color: whitesmoke;">
                                        <h4>Announcement Title<h4>
                                        <h6>November 28, 2019 | Teacher's name</h6>
                                        <p>Announcement details here...</p>
                                        </div>

                                        <br>

                                        <div style="background-color: whitesmoke">
                                        <h4>Announcement Title<h4>
                                        <h6>November 28, 2019 | Teacher's name</h6>
                                        <p>Announcement details here...</p>
                                        </div>

                                        <br>

                                        <div style="background-color: whitesmoke">
                                        <h4>Announcement Title<h4>
                                        <h6>November 28, 2019 | Teacher's name</h6>
                                        <p>Announcement details here...</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END of ANOUNCEMENTS -->

                                <!-- OVERVIEW -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-file-alt"></i>
                                            </div>
                                            <div class="text">
                                                <h2>5</h2>
                                                <span>Taken quiz</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div class="text">
                                                <h2>95.9%</h2>
                                                <span>Average Score</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-book"></i>
                                            </div>
                                            <div class="text">
                                                <h2>15</h2>
                                                <span>Subjects <br/> Enrolled </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-certificate"></i>
                                            </div>
                                            <div class="text">
                                                <h2>PASSED</h2>
                                                <span>Results</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- END OF OVERVIEW -->
                            </div>
                            <div class="col-md-4">

                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Profile Card</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" style="width:50%;" src="images/icon/avatar-dan.jpg" alt="Card image cap">
                                            <h5 class="text-sm-center mt-2 mb-1"> Admin Admin</h5>
                                            <div class="location text-sm-center">
                                                <i class="fa fa-groups"></i>Section: BSIT-3B1</div>
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
                                                <input type="text" id="name" placeholder="" required="" value="Admin Admin" readonly class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail2" class="px-1  form-control-label">FirstName</label><br>
                                                <input type="email" id="email" placeholder="" required="" value="allanadan1999@gmail.com" readonly class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName2" class="pr-1  form-control-label">Lastname</label><br>
                                                <input type="text" id="name" placeholder="" required="" value="Admin Admin" readonly class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail2" class="px-1  form-control-label">Middlename</label><br>
                                                <input type="email" id="email" placeholder="" required="" value="allanadan1999@gmail.com" readonly class="form-control">
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




                        


                    <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Dan Astillero. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
