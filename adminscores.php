<?php
include('connection.php');
include('adminsession.php');
include('functions.php');

$profileid=$_SESSION['adminid']; 
$_SESSION['sidebar']="scores";

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
                                <h2>Scores</h2>
                                <hr />
                            </div>
                            <div class="row">
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->

                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">
                                                <input type="Search" id="searchscoreid" onkeyup="searchscore()"
                                                    placeholder="Search here..."
                                                    style="width: 520px; min-height:40px; display:none">
                                            </div>

                                            <div class="table-data__tool-right">
                                                <div class="rs-select2--light rs-select2--md">
                                                    <select class="js-select2" name="sections" id="filterid"
                                                        onchange="changedfilter()">
                                                        <option value="Filter" selected="selected" disabled>Filter
                                                        </option>
                                                        <option value="byname">By Name</option>
                                                        <!-- <option value="bysection">By Section</option>
                                              <option value="bysubject">By Subject</option> -->
                                                        <option value="byquiztitle">By QuizTitle</option>
                                                        <option value="byscore">By Score</option>
                                                        <option value="byaveragescore">By Average Score</option>
                                                        <option value="byremarks">By Remarks</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                    <select class="js-select2" name="type"
                                                        onchange="location=this.value">
                                                        <option selected="selected">Export</option>
                                                        <option value="adminscorespdf.php">Pdf</option>
                                                        <!--option value="">HTML</option-->
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Quiz title</th>
                                                        <th>Score</th>
                                                        <th>Average Score</th>
                                                        <th>remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="response">
                                                    <?php 
                                            $sql="select (select concat(lname, ', ', fname) as name from userstbl 
                                            where userid=scoretbl.userid) as user, 
                                            (SELECT quizname from quiztbl where quizid=scoretbl.quizid) as quizname,
                                             concat(totalscore, '/', totalitems) as score, 
                                             averagescore, remarks from scoretbl ORDER BY user";
                                            $result=mysqli_query($con, $sql);
                                            while($row=mysqli_fetch_array($result)){

                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['user']; ?></td>
                                                        <td><?php echo $row['quizname']; ?></td>
                                                        <td><?php echo $row['score']; ?></td>
                                                        <td><?php echo $row['averagescore']. "%"; ?></td>

                                                        <td <?php
                                                  $rem=$row['remarks'];

                                                  if($rem=="PASSED"){
                                                    echo "class='process' ";
                                                  }else{
                                                    echo "class='denied' ";
                                                  }
                                                ?>><?php echo $row['remarks']; ?></td>
                                                    </tr>
                                                    <?php  } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE-->
                                    </div>
                                </div> <!-- row -->
                            </div> <!-- section__content -->
                        </div><!-- container Fluid -->
                    </div><!-- main content -->
                    <!-- END MAIN CONTENT-->
                    <!-- END PAGE CONTAINER-->
                </div>

            </div>

            <script>
                function changedfilter() {
                    var selectvalue = document.getElementById("filterid").value;
                    document.getElementById("searchscoreid").style.display = "inline";
                    //window.alert(selectvalue);
                }

                function searchscore() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            document.getElementById("response").innerHTML = this.responseText;
                        }
                    };
                    var selectvalue = document.getElementById("filterid").value;
                    var tosearch = document.getElementById("searchscoreid").value;
                    //window.alert(selectvalue + ", " + tosearch);
                    var palatandaan = "searchscore";
                    xhttp.open("GET", "process.php?palatandaan=" + palatandaan + "&selectvalue=" + selectvalue +
                        "&tosearch=" + tosearch, true);
                    xhttp.send();
                }
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