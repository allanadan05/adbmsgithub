<?php
include('connection.php');
include('adminsession.php');
include('functions.php');
$_SESSION['sidebar']="subjects";
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
                                <h2>Subjects</h2>
                                <hr />
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

                            if(isset($_GET['deletesubresult'])){
                                $deletesubresult=$_GET['deletesubresult'];
                                if($deletesubresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> Deleted successfully  :) </div>";
                                }
                                if($deletesubresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> Sorry, cannot be deleted  :( </div>";
                                }
                            }  
                            ?>

                            <!-- Add Subject -->
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="addsub.php" method="POST">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Add Subject </h4>
                                            </div>
                                            <div class="card-body">
                                                <strong class="card-title">
                                                    <input type="text" name="subjectname" id="subname"
                                                        placeholder="Enter Subject Title" autofocus="autofocus"
                                                        style="width: 800px;">
                                                    <input type="hidden" name="uId" id="uId">
                                                </strong>
                                                <hr>
                                                <p class="card-text"> <textarea name="subjectdesc" id="subdes"
                                                        style="width: 800px;"
                                                        placeholder=" Type description here... "></textarea>
                                                </p>

                                                <!-- <h5>Assign to existing sections: </h5><hr> -->
                                                <!-- <div id="seccheckbox">
                                        <?php
                                                

                                                // $sql="SELECT sectiontbl.sectionid, sectiontbl.sectionname,count(userstbl.userid) as 'number of students' from userstbl join sectiontbl on userstbl.sectionid=sectiontbl.sectionid group by sectiontbl.sectionname ";
                                                $sql = "SELECT * from sectiontbl";
                                                $result=mysqli_query($con, $sql);

                                                if(mysqli_num_rows($result)){
                                                while($row = mysqli_fetch_array($result))
                                                {?>
                                                <ul>
                                                <label>
                                                    <input type="checkbox" value="<?php  echo $row['sectionid']; ?>" name="<?php  echo $row['sectionname']; ?>"><?php  echo " " .$row['sectionname']; ?>
                                                </label>
                                                </ul>
                                                <?php }
                                            }?>
                                        </div>                    -->
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"
                                                    style="display: inline;" id="addsubj" name="submitnewsubject"><i
                                                        class="fas fa-plus"></i> ADD</button>
                                                <button type="submit" class="btn btn-primary"
                                                    style="float:right; display: none;" name="editnewsubject"
                                                    id="updatesubj"><i class="fas fa-save"></i> SAVE</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /End Add Subject -->

                        <div class="row">
                            <?php  while ($row=mysqli_fetch_assoc($query)) {  ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title"><a href="#"><?php echo $row['subjectname'] ?></a>
                                            <input type="hidden" id="<?php echo "title" .$row['subjectid'] ?>"
                                                value="<?php echo $row['subjectname'] ?>">
                                            <small>
                                                <span class="badge badge-success float-right mt-1"
                                                    id="<?php echo "badge" .$row['subjectid']; ?>">
                                                    <?php  
                                                $sssqll="SELECT count(sectionid) AS assignedcount from sectionsubjecttbl where subjectid=" .$row['subjectid'];
                                                $result=mysqli_query($con, $sssqll);
                                                $r=mysqli_fetch_assoc($result);
                                                echo $r['assignedcount'];
                                                ?>
                                                </span>
                                            </small>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $row['subjectdesc'] ?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <button class="btn btn-success"
                                                style="font-size: 13px; width: auto; height: auto;" data-toggle="modal"
                                                data-target="#add"
                                                onclick="showassignedsections(<?php echo $row['subjectid']; ?>)"><i
                                                    class="fas fa-check-square"></i> &nbsp Assign</button>
                                            &nbsp&nbsp&nbsp
                                            <button class="btn btn-warning"
                                                style="font-size: 13px; width: auto; height: auto;"
                                                onclick="editsubject(<?php echo $row['subjectid']; ?>)"><i
                                                    class="fas fa-pencil-square-o"></i>EDIT</button> &nbsp&nbsp&nbsp
                                            <a href="<?php echo "addsub.php?deletesubject=1&id=".$row['subjectid'] ?>"><button
                                                    class="btn btn-danger"
                                                    style="font-size: 13px; width: auto; height: auto;"> <i
                                                        class="fas fa-trash"></i>DELETE</button></a>
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

        <!-- MODAL ADD -->
        <div class="add-user-modal">
            <div class="modal" id="add">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h6 class="modal-title" id="modaltitle">Assign Subject</h6>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <form action="#" method="GET">
                                <input type="hidden" name="hiddensubid" id="hiddensubid">
                                <div id="seccheckbox">

                                    <?php
                            $sql="SELECT * from sectiontbl ";
                            $result=mysqli_query($con, $sql);

                            if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_array($result))
                            {?>
                                    <ul>
                                        <label>
                                            <!-- check section if already assigned to a subject  -->
                                            <input type="checkbox" value="<?php  echo $row['sectionid']; ?>"
                                                name="<?php  echo $row['sectionname']; ?>" <?php
                                     $sqlss="SELECT * from sectionsubjecttbl where sectionid=".$row['sectionid'];
                                     $resultss=mysqli_query($con, $sqlss);
                                     if(mysqli_num_rows($resultss)){
                                     while($rowss = mysqli_fetch_array($resultss)){
                                        if($rowss['subjectid'] == 2 ){
                                            echo "checked=checked";
                                        }
                                     }
                                    }
                                ?>> <!-- end tag of input type chekbox -->
                                            <?php  echo " " .$row['sectionname']; ?>

                                        </label>
                                    </ul>
                                    <?php }
                        }?>
                                </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <!-- <button type="submit" id="submitbtn" class="btn btn-success" style="display: inline" name="assignsectiontosubject">Submit</button> &nbsp  -->
                            <button type="button" class="btn btn-primary" data-dismiss="modal"
                                onclick="history.go(0)">Save</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /MODAL ADD -->

        <!-- JS functions -->
        <script>
            // function top(){
            //     document.body.scrollTop = 0; // For Safari
            // 	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            // }
            function assignbutton(subid) {
                document.getElementById("hiddensubid").value = subid;
                document.getElementById("modaltitle").innerHTML = document.getElementById("title" + subid).value;
            }

            function showassignedsections(subjectid) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("seccheckbox").innerHTML = this.responseText;
                        document.getElementById("hiddensubid").value = subjectid;
                        document.getElementById("modaltitle").innerHTML = document.getElementById("title" +
                            subjectid).value;
                    }
                };
                var subjectid = subjectid;
                var palatandaan = "showassignedsections";
                xhttp.open("GET", "process.php?palatandaan=" + palatandaan + "&subjectid=" + subjectid, true);
                xhttp.send();
            }

            function assignsectiontosubject(secid, subid) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        // window.alert(this.responseText);
                    }
                };
                var subid = subid;
                var secid = secid;
                var palatandaan = "assignsectiontosubject";
                xhttp.open("GET", "process.php?palatandaan=" + palatandaan + "&subid=" + subid + "&secid=" + secid,
                    true);
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