<?php
include('connection.php');
include('adminsession.php');
include('functions.php');



?>
<!DOCTYPE html>
<php lang="en">

<head>
    
    <script>
        function stat(id){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) { 
                document.getElementById("response").innerHTML = this.responseText;
        }
      };
            var forIpinasa=id;
            var palatandaan = "stat";
            xhttp.open("GET", "process2.php?forIpinasa="+forIpinasa+"&palatandaan="+palatandaan, true);
            xhttp.send(); 
        }
    </script>

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
                                <h2>Quizzes</h2><hr/>
                                <?php 
                                   if(isset($_GET['addquizresult'])){
                                    $addquizresult=$_GET['addquizresult'];
                                        if($addquizresult=="success"){
                                            echo "<div class='alert alert-primary' role='alert'> Quiz has been added :) </div>";
                                        }
                                        if($addquizresult=="failed"){
                                            echo "<div class='alert alert-danger' role='alert'> Quiz cannot been added :) </div>";
                                        }
                                   }
                                ?>
                            </div>
                        <div class="row">
                           
                             <div class="col-md-12">
                                <div class="card border border-primary">
                                    <div class="card-header">
                                        <form method="POST" action="process2.php">
                                        <div class="row">
                                        <strong class="card-title">Question for </strong>  &nbsp &nbsp
                                        <select class="js-select2" name="chosensubject" required>
                                                <option selected="selected" disabled>Choose Subject</option>
                                                 <?php 
                                                   $sqlstring="SELECT * FROM subjecttbl";
                                                   $querystring=mysqli_query($con, $sqlstring);
                                                   while($row=mysqli_fetch_array($querystring)){
                                                ?>
                                                <option value="<?php echo $row['subjectid']; ?>"><?php echo $row['subjectname']; ?></option>
                                                <?php } ?>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                        </div>
                                        <strong>Quiz Title </strong>  &nbsp &nbsp
                                        <input type="text" name="qtitle" placeholder="Type title here" required>
                                        <br>
                                        <strong>Duration:</strong> &nbsp &nbsp <input type="time" name="time" required>
                                    </div>
                                    <div class="card-body">
                                        <strong>Question: &nbsp</strong><br>
                                        <p class="card-text"><input type="text" name="question" placeholder="Enter question here..." style="width:100%" required>
                                        </p>
                                        <br/>
                                        <div class="row form-group">
                                                <div class="col col-md-2">
                                                    
                                                </div>
                                                <div class="col col-md-8">
                                                    <div class="form-check">
                                                        <strong>A. &nbsp</strong>
                                                        <input type="text" name="optiona" placeholder="Choice A" style="width:50%" required>
                                                        <br><strong>B. &nbsp</strong>
                                                        <input type="text" name="optionb" placeholder="Choice B" style="width:50%" required>
                                                        <br><strong>C. &nbsp</strong>
                                                        <input type="text" name="optionc" placeholder="Choice C" style="width:50%" required>
                                                        <br><strong>D. &nbsp</strong>
                                                        <input type="text" name="optiond" placeholder="Choice D" style="width:50%" required>
                                                    </div>
                                                    <br>
                                                  Answer: <input type="text" name="answer" maxlength="1" style="width: 100%" placeholder="Type the letter of the correct answer here... " required>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <!-- <button type="edit" class="btn btn-secondary btn-sm">
                                            <i class="fa fa-pencil-square-o"></i> Edit
                                        </button> -->
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-sm" name="submitquiz">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </form>
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
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="response">
                                            <?php
                                                $sql="select quizid, quizname, (SELECT subjectname from subjecttbl WHERE subjectid=quiztbl.subjectid) AS subject, duration, status from quiztbl";
                                                $result=mysqli_query($con, $sql);
                                                while($row=mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['quizname']; ?></td>
                                                <td><?php echo $row['subject']; ?></td>
                                                <td><?php echo $row['duration']; ?></td>
                                                <?php 
                                                $stat="";
                                                if($row['status']=="ACTIVATED"){
                                                    echo '<td style="color: green;">';
                                                    $stat="Deactivate";
                                                }else{
                                                    echo '<td style="color: red;">';
                                                    $stat="Activate";
                                                }
                                                ?>
                                                <?php echo $row['status']; ?>
<!--                                                     <label class="switch switch-3d switch-success mr-3">
                                                      <input type="checkbox" class="switch-input" checked="true">
                                                      <span class="switch-label"></span>
                                                      <span class="switch-handle"></span>
                                                    </label> -->
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button onclick="stat(<?php echo $row['quizid']; ?>)" class="item" data-toggle="modal" data-placement="top" title="<?php echo $stat; ?>" type="button">
                                                            <i class="zmdi zmdi-power"></i>
                                                        </button>
                                                        <button type="button" onclick="editstudent(<?php echo $row['quizid']; ?>)" class="item" data-placement="top" title="Edit"  data-toggle="modal" data-target="#modalbox">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <a href="<?php echo "process2.php?deletestudent=1&id=".$row['quizid'] ?>">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                           <?php } ?>
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


    <!-- modal medium -->
    <div class="modal fade" id="modalbox" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <form action="announcement.php" method="POST">
                    <input type="hidden" name="hiddensendid" id="hiddensendid">
                    <input type="text" name="anfrom" value="<?php echo teachersgetname($id);?>" style="display:inline;" readonly>
                    <input type="date" name="dateposted" value="<?php echo date("Y-m-d"); ?>" style="display:inline;" readonly>
                    <h5 class="modal-title" id="mediumModalLabel"><input type="text" name="antitle" placeholder="Type Title here..."></h5>
                </div>
                <div class="modal-body">
                <textarea rows="5" cols="90" name="andetails" placeholder="Type message here..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="addAnnPerStudent" class="btn btn-primary" id="sendbtn">Send</button>
                 </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal medium -->

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
