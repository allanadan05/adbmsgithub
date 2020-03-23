<?php
include('connection.php');
include('teachersession.php');
include('functions.php');

if($_SESSION['access']=="teacher"){

}else{
    header("Location: index.php?login=access");
    exit();
}

$_SESSION['sidebar']="students";
$teacher=teachersgetname($teachersid);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script>
        function changedfilter() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("response").innerHTML = this.responseText;
                }
            };
            var filterid = document.getElementById('filterid').value;
            //document.write(filterid);
            var palatandaan = "changedfilter";
            xhttp.open("GET", "process2.php?filterid=" + filterid + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        function searchstudent() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("response").innerHTML = this.responseText;
                }
            };
            var tosearch = document.getElementById('searchstudent').value;
            var teachersid = document.getElementById('teachersid').value;
            //document.write(teachersid);
            var palatandaan = "searchassignedstudent";
            xhttp.open("GET", "process2.php?tosearch=" + tosearch + "&teachersid=" + teachersid + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        

        function setmodalid(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var objStud = JSON.parse(this.responseText);
                    var fullName = document.getElementById('fullName').innerHTML
                    document.getElementById('fullName').innerHTML = fullName;
                    var lname = document.getElementById("studlname").value = fullName;
                }
            }
            var fullName = document.getElementById('fullName').innerHTML;
            var tokenStudName = "fullName";
            var idStudName = id;
            xmlhttp.open("GET", "process3.php?id=" + idStudName + "&tokenStudName=" + tokenStudName, true);
            xmlhttp.send();
            document.getElementById("hiddensendid").value = id;
        }
    </script> 

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="teacher teacher">
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
        <?php include("teacherheadermobileandsidebar.php"); ?>
        <!-- HEADER MOBILE and SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include("teacherheader.php"); ?>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div>
                            <h2>Students</h2>
                            <hr />
                            <?php
                            
                            if(isset($_GET['notifsent'])){
                                $notifsent=$_GET['notifsent'];
                                if($notifsent=="success"){
                                echo "<div class='alert alert-primary' role='alert'> Notification has been sent! :) </div>";
                                }
                                if($notifsent=="failed"){
                                echo "<div class='alert alert-danger' role='alert'>  Notification cannot be sent! :( </div>";
                                } 
                            }
                            ?>

                             <!--newline code-->
                            <!--adduser.php-->
                            <?php

                            //save
                            if(isset($_GET['password']) && $_GET['password']=="tooShort")
                            {
                                echo "<div class='alert alert-danger' role='alert'>Password must be more than 4 characters </div>";
                            }
                            if(isset($_GET['exist']) && $_GET['exist']=="email") 
                            {
                            echo "<div class='alert alert-danger' role='alert'>Email already exist </div>";
                            }
                            if(isset($_GET['new']) && $_GET['new']=="student")
                            {
                                echo "<div class='alert alert-success' role='alert'>Profile Added Successfully</div>";
                            }
                            //edit

                            if(isset($_GET['password']) && $_GET['password']=="tooShortEdit")
                            {
                                echo "<div class='alert alert-danger' role='alert'>Password must be more than 4 characters </div>";

                            }
                            if(isset($_GET['exist']) && $_GET['exist']=="emailEdit") 
                            {
                            echo "<div class='alert alert-danger' role='alert'>Already Exist Email </div>";
                            }  

                            if(isset($_GET['exist']) && $_GET['exist']=="image") 
                            {
                            echo "<div class='alert alert-primary' role='alert'>Already exist image</div>";
                            }  

                            ?>
                            <!--adduser.php-->

                            <div class="row">
                                <div class="col-md-12">

                                    <!-- DATA TABLE -->
                                   
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" name="sections" id="filterid"
                                                    onchange="changedfilter()">
                                                    <option value="0" selected="selected" disabled>By Assigned Subject/s</option>
                                                    <?php 
                                                   $sqlstring="select *, (select subjectname from subjecttbl where subjectid=teachersubjecttbl.subjectid) as subjectname from teachersubjecttbl where teachersid='$teachersid' ";
                                                   $querystring=mysqli_query($con, $sqlstring);
                                                   while($row=mysqli_fetch_array($querystring)){
                                                ?>
                                                    <option value="<?php echo $row['subjectid']; ?>">
                                                        <?php echo $row['subjectname']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <button class="au-btn-filter">
                                                <i class="zmdi zmdi-filter-list"></i>Filters</button>
                                        </div>
                                       
                                        <div class="table-data__tool-right">
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small"
                                                data-toggle="modal" data-target="#add">
                                                <i class="zmdi zmdi-plus"></i>Add Student</button>
                                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                <select class="js-select2" name="type" onchange="location=this.value">
                                                    <option selected="selected">Export</option>
                                                    <option value="teacherstudentpdf.php">Pdf</option>
                                                    <!--option value="">HTML</option-->
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="title-5 m-b-35" style="background-color: whitesmoke;"><input
                                            style="width:95%; min-height:50px;" type="Search" id="searchstudent"
                                            onkeyup="searchstudent()" placeholder="Search here..."><i
                                            class="fas fa-search"></i></h3>

                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Section</th>
                                                    <th>Average Score</th>
                                                    <!-- <th>Remarks</th> -->
                                                    <th>Subjects</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody id="response">

                                                <?php
                                        
                                        /*$sql="SELECT userstbl.userid, userstbl.lname, userstbl.fname, userstbl.email, sectiontbl.sectionname, (SELECT averagescore FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS AverageScore,(SELECT remarks FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS Remarks from userstbl left join sectiontbl on userstbl.sectionid=sectiontbl.sectionid  order by userstbl.lname";*/

                                        // $sql="SELECT userstbl.userid, userstbl.lname, userstbl.fname, userstbl.email, sectiontbl.sectionname from userstbl left join sectiontbl on userstbl.sectionid=sectiontbl.sectionid  order by userstbl.lname";
                                       
                                        // pagination 
                                        
                                        if(isset($_GET['page']))
                                        {
                                            $page = $_GET['page'];
                                        }
                                         else
                                        {
                                            $page = 1;
                                        }
                                        
                                        $num_of_page = 5; // limit ng page niya sa table
                                        $start_from= ($page-1)*5;                                      
                                       //pagination
                                       
                                        $sql="select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email, userstbl.image, userstbl.sectionid,
                                         (select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname, 
                                         (select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore 
                                         from userstbl where sectionid=(select sectionid from teachersectiontbl where teachersid='$teachersid')  
                                         order by userstbl.lname limit $start_from,$num_of_page";
                                         
                                        $result=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($result)){
                                        while($row = mysqli_fetch_array($result))
                                        {?>

                                                <tr class="tr-shadow">
                                                    <div id="showDel">
                                                        
                                                    </div>
                                                    <?php echo "<td>".$row['lname'].", ".$row['fname']."</td>"; ?>
                                                    <?php echo "<td>".$row['email']."</td>";?>
                                                    <?php echo "<td>".$row['sectionname']."</td>";?>
                                                    <td>
                                                        <span <?php 
                                                    if($row['averagescore']>=75.00){
                                                        echo 'class="status--process"'; 
                                                        $remarks="PASSED";
                                                    }else{
                                                         if($row['averagescore']<=0){
                                                            //do nothing
                                                            $remarks="Undefined";
                                                         }else{
                                                            echo 'class="status--denied"';
                                                            $remarks="FAILED";
                                                         }
                                                     }
                                                     ?>>
                                                            <?php echo $row['averagescore'] ." % \n" .$remarks; ?>
                                                    </td>
                                                    <!-- <?php echo "<td>".$row['subjects']."</td>";?>     
                                               <?php echo "<td> Subjects </td>";?>                                            -->
                                                    <td>
                                                        <?php
                                               $q="select subjectid, (select subjectname from subjecttbl where subjectid=sectionsubjecttbl.subjectid) AS subjectname from sectionsubjecttbl where sectionid=" .$row['sectionid'];
                                               $r=mysqli_query($con, $q);
                                                if(mysqli_num_rows($r)){
                                                while($sub = mysqli_fetch_array($r))
                                                {
                                                    echo $sub['subjectname'] .", ";
                                                }
                                                }
                                               ?>
                                                    </td>
                                                    <td>
                                                        <img style="width: 30px; height: 30px; border-radius: 100px;"
                                                            onerror="this.src='images/defaultpic/defaultPIC.png'"
                                                            src="<?php echo "images/profile_picture/".$row['image']."";?>">
                                                    </td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button onclick="setmodalid(<?php echo $row['userid']; ?>)"
                                                                class="item" data-toggle="modal" data-placement="top"
                                                                title="Send Notification" type="button"
                                                                data-target="#sendnotif">
                                                                <i class="zmdi zmdi-mail-send"></i>
                                                            </button>
                                                           
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php      

                                        } // end of line code  while($row = mysqli_fetch_array($result))
                                    
                                        
                                   }
                                    else{
                                        echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
                                        </tr>";
                                    }
                                    ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <?php
                                    //buttons page pagination
                                
                                    $perpage="select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email, userstbl.image, 
                                    (select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname,
                                     (select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore
                                      from userstbl order by userstbl.lname ";

                                      $perpageResult=mysqli_query($con,$perpage);
                                      $totalRecord=mysqli_num_rows($perpageResult);
                                        // note lang totalpage=ceil(rows/numpage) - ceil convert to decimal to integer
                                      $totalPage=ceil($totalRecord/$num_of_page);
                                        //echo $totalPage;
                                        if($page>1)
                                        {
                                            echo "<a class='btn btn-warning' href='teacherstudents.php?page=".($page-1)."'>Previous</a>";
                                        }
                                      for($i=1;$i<$totalPage;$i++)
                                        {
                                            echo "<a class='btn btn-info' href='teacherstudents.php?page=".$i."'>$i</a>";
                                        }
                                        if($page>1)
                                        {
                                            echo "<a class='btn btn-primary' href='teacherstudents.php?page=".($page+1)."'>Next</a>";
                                        }
                                    //buttons page pagination                                      
                                    ?>
                                    <!-- END DATA TABLE -->
                                </div>
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
                            <h6 class="modal-title" id="modaltitle">Add Student</h6>

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <form action="adduser.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="hiddenuserid" id="hiddenuserid">
                                <table border="0" style="border-collapse: collapse;">

                                    <tr>
                                        <td>Image:</td>
                                        <td><input type="file" id="image" name="image" value=""></td>
                                    </tr>
                                    <div style="display:none;" id="showStudtimage">
                                        <!-- image view per student-->
                                        <!--input type="text" id="hiddenuseridStudent">
                                <input type="text" id="resultimage" value="test"-->
                                        <!--span id="displayimage"></span-->
                                        <input type="test" id="resultimage" value="test" value="test" readonly>
                                        <!-- image view per student-->

                                    </div>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="email" name="email" id="email" placeholder="Enter Email"
                                                onkeyup="validEmail();" maxlength="30" required></td>
                                        <br>
                                    </tr>
                                    <span style=" margin: 40px 0 0 20px;" id="chkEmail"></span>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input type="password" name="password" id="password"
                                                placeholder="Enter Password " onkeyup="tooShortPassword();"
                                                maxlength="30" required><span id="chkpwd"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Firstname:</td>
                                        <td><input type="text" name="fname" id="fname" placeholder="Enter Firstname"
                                                required></td>
                                    </tr>
                                    <tr>
                                        <td>Lastname:</td>
                                        <td><input type="text" name="lname" id="lname" placeholder="Enter Lastname"
                                                required></td>
                                    </tr>
                                    <tr>
                                        <td>Middlename: &nbsp&nbsp&nbsp</td>
                                        <td><input type="text" name="mname" id="mname" placeholder="Enter Middlename">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Section:</td>
                                        <td><select name="sectionid" id="sec" required>
                                                <option id="sectionselected" selected readonly>Choose Section</option>
                                                <?php 
                           $sql="SELECT * from sectiontbl";
                           $result=mysqli_query($con, $sql);
                           if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_array($result))
                            { 
                           ?>
                                                <option value="<?php echo $row['sectionid'] ?>">
                                                    <?php echo $row['sectionname'] ?></option>
                                                <?php }
                            }?>
                                            </select></td>
                                    </tr>
                                </table>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" id="submitbtn" class="btn btn-success" style="display: inline;"
                                name="addstudentsubmit">Submit</button> &nbsp
                            
                            <!--button onclick="addstudBtn();" type="button" class="btn btn-danger" data-dismiss="modal">Close</button-->
                            <a class="btn btn-danger" data-dismiss="modal" href="#">Close</a>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /MODAL ADD -->
        <!-- modal medium -->
        <div class="modal fade" id="sendnotif" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <form action="announcement.php" method="POST">
                            <input type="hidden" name="hiddensendid" id="hiddensendid">

                            <h5 class="modal-title" id="mediumModalLabel"><input type="text" name="antitle"
                                    placeholder="Type Title here..."></h5>
                    </div>
                    <div class="modal-body">
                        <textarea rows="5" cols="90" name="andetails" placeholder="Type message here..."></textarea>
                        <hr>
                        <h5>From: </h5>
                        <h5 id="fullName"><?php echo $teacher; ?></h5><input type="date" name="dateposted"
                                value="<?php echo date("Y-m-d"); ?>" style="display:inline;" readonly>
                            <input type="text" id="studlname" name="teachersname" value="<?php echo $teacher; ?>" style="display:none;">
                            <input type="text" id="teachersid" name="teachersname" value="<?php echo $teachersid; ?>" style="display:none;">
                            <!--print teachers name-->
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

        <!-- new line code-->
        <script>
            //this method check na yung... all item using check box
            $('#checkall').change(function() {
                $('.checkitem').prop("checked", $(this).prop("checked"))
            });
        </script>
        <!--new line code-->
</body>

</html>
<!-- end document-->