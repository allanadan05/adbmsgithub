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
                                <h2>Lessons</h2><hr/><br/>
                            </div>
                        <div class="row">
                            <div class="col-md-4">
                                    <div class="card">
                                     <div class="card-header">
                                        <div class="row">
                                            <select class="js-select2" name="subjects" style="width: 50%";>
                                                <option selected="selected">Subjects</option>
                                                <option value="">Mathematics</option>
                                                <option value="">Science</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                             <strong class="card-title"><a href="#"> <input type="text" name="newsubject" placeholder="Enter Lesson Title" autofocus="autofocus" style="width: 50%";> </a>
                                            </strong>
                                        </div>
                                     </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Enter Lesson Description..." class="form-control"></textarea>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <label for="file-input" class=" form-control-label">Upload File</label><br>
                                                <input type="file" id="file-input" name="file-input" class="form-control-file">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" style="float:right;"><i class="fas fa-plus"></i>ADD</button>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-4">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="#"> Mathematics <i class="fas fa-link"></i></a></strong><br>
                                         <p>Lesson 1</p>
                                     </div>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <button class="btn btn-warning"><i class="fas fa-pencil-square-o"></i>EDIT</button> &nbsp&nbsp&nbsp
                                             <button class="btn btn-danger"><i class="fas fa-trash"></i>DELETE</button>
                                         </div>
                                    </div>
                                </div> 
                            </div>

                             <div class="col-md-4">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="#"> Mathematics <i class="fas fa-link"></i></a></strong><br>
                                         <p>Lesson 1</p>
                                     </div>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <button class="btn btn-warning"><i class="fas fa-pencil-square-o"></i>EDIT</button> &nbsp&nbsp&nbsp
                                             <button class="btn btn-danger"><i class="fas fa-trash"></i>DELETE</button>
                                         </div>
                                    </div>
                                </div> 
                            </div>

                             <div class="col-md-4">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="#"> Mathematics <i class="fas fa-link"></i></a></strong><br>
                                         <p>Lesson 1</p>
                                     </div>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <button class="btn btn-warning"><i class="fas fa-pencil-square-o"></i>EDIT</button> &nbsp&nbsp&nbsp
                                             <button class="btn btn-danger"><i class="fas fa-trash"></i>DELETE</button>
                                         </div>
                                    </div>
                                </div> 
                            </div>

                             <div class="col-md-4">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="#"> Mathematics <i class="fas fa-link"></i></a></strong><br>
                                         <p>Lesson 1</p>
                                     </div>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <button class="btn btn-warning"><i class="fas fa-pencil-square-o"></i>EDIT</button> &nbsp&nbsp&nbsp
                                             <button class="btn btn-danger"><i class="fas fa-trash"></i>DELETE</button>
                                         </div>
                                    </div>
                                </div> 
                            </div>

                             <div class="col-md-4">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="#"> Mathematics <i class="fas fa-link"></i></a></strong><br>
                                         <p>Lesson 1</p>
                                     </div>
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <button class="btn btn-warning"><i class="fas fa-pencil-square-o"></i>EDIT</button> &nbsp&nbsp&nbsp
                                             <button class="btn btn-danger"><i class="fas fa-trash"></i>DELETE</button>
                                         </div>
                                    </div>
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
