<?php
include('connection.php');
include('adminsession.php');

$sql="SELECT * FROM subjecttbl";
$query=mysqli_query($con, $sql);

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

    <script src="functions.js"></script>

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
                                <h2>Subjects</h2><hr/>
                            </div>
                            <div id="response"></div>
                            <?php 
                            if(isset($_GET['addsubresult'])){
                                $addsubresult=$_GET['addsubresult'];

                                if($addsubresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> New subject has been added :) </div>";
                                }
                                if($addsubresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> New subject cannot be added :( </div>";
                                } 
                            }
                            if(isset($_GET['editsubresult'])){
                                $editsubresult=$_GET['editsubresult'];
                                if($editsubresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'>"  .$_GET['subname']. " has been updated  :) </div>";
                                }
                                if($editsubresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'>"  .$_GET['subname']. " cannot be updated  :( </div>";
                                }
                            }

                             
                            ?>
                          <div class="row">
                            <div class="col-md-4">
                                <form action="addsub.php" method="POST">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"> 
                                            <input type="text" name="subjectname" id="subname" placeholder="Enter Subject Title" autofocus="autofocus"> 
                                            <input type="hidden" name="uId" id="uId">
                                        </strong>
                                     </div>
                                    <div class="card-body">
                                        <p class="card-text"> <input type="text" name="subjectdesc" id="subdes"  placeholder="Type description here..."> 
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" style="float:right; display: inline;"  id="addsubj" name="submitnewsubject"><i class="fas fa-plus"></i> ADD</button>
                                        <button type="submit" class="btn btn-primary" style="float:right; display: none;"  name="editnewsubject" id="updatesubj"><i class="fas fa-save"></i> SAVE</button>
                                    </div>
                                </form>

                               </div> 
                            </div>
                            <?php  while ($row=mysqli_fetch_assoc($query)) {  ?>
                            <div class="col-md-4">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="<?php echo $row['subjectid'] ?>"><?php echo $row['subjectname'] ?></a>
                                            <small>
                                                <span class="badge badge-success float-right mt-1">3</span>
                                           </small>
                                        </strong>
                                     </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $row['subjectdesc'] ?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <button class="btn btn-warning" onclick="editsubject(<?php echo $row['subjectid']; ?>)"><i class="fas fa-pencil-square-o"></i>EDIT</button> &nbsp&nbsp&nbsp
                                             <button class="btn btn-danger"><i class="fas fa-trash" onclick="deletesubject(<?php echo $row['subjectid'] ?>)"></i>DELETE</button>
                                         </div>
                                    </div>
                                </div> 
                            </div>
                        <?php } ?>
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
