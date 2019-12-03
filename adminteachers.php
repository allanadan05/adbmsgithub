<?php
include('connection.php');
include('adminsession.php');
include('functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <script>
        function changedsections(){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) { 
                document.getElementById("response").innerHTML = this.responseText;
        }
      };
            var secid=document.getElementById('secid').value;
            //document.write(forIpinasa);
            var palatandaan = "changedsec";
            xhttp.open("GET", "process2.php?secid="+secid+"&palatandaan="+palatandaan, true);
            xhttp.send(); 
        }

        function searchstudent(){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) { 
                document.getElementById("response").innerHTML = this.responseText;
        }
      };
            var tosearch=document.getElementById('searchstudent').value;
            //document.write(forIpinasa);
            var palatandaan = "searchstudent";
            xhttp.open("GET", "process2.php?tosearch="+tosearch+"&palatandaan="+palatandaan, true);
            xhttp.send(); 
        }

    function editstudent(id){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) { 
                var buongObject=JSON.parse(this.responseText);
                //document.getElementById("response").innerHTML = buongObject.sname;
                document.getElementById("email").value = buongObject.email;
                document.getElementById("password").value = buongObject.password;
                document.getElementById("lname").value = buongObject.lname;
                document.getElementById("fname").value = buongObject.fname;
                document.getElementById("mname").value = buongObject.mname;
                document.getElementById("sectionselected").label = buongObject.sectionname;
                document.getElementById("sectionselected").value = buongObject.sectionid;
                document.getElementById("modaltitle").value = "EDIT Student";
                document.getElementById("hiddenuserid").value = forwardedid;
                document.getElementById("submitbtn").style.display="none";
                document.getElementById("savebtn").style.display="inline";
        }
      };

    var forwardedid = id;
    //document.write(forwardedid);
    var palatandaan = "editstudent";
    xhttp.open("GET", "process2.php?forwardedid="+forwardedid+"&palatandaan="+palatandaan, true);
    xhttp.send(); 
    }

    function setmodalid(id){
        document.getElementById("hiddensendid").value=id;
    }

    </script>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Admin Admin">
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
                            <h2>Teachers</h2><hr/>
                            <?php
                             if(isset($_GET['editstudentresult'])){
                                $editstudentresult=$_GET['editstudentresult'];
                                if($editstudentresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." has been updated :) </div>";
                                }
                                if($editstudentresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'>  Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." cannot be updated :( </div>";
                                } 
                            }
                            
                            if(isset($_GET['deletestudentresult'])){
                                $deletestudentresult=$_GET['deletestudentresult'];
                                if($deletestudentresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> Profile has been deleted :) </div>";
                                }
                                if($deletestudentresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'>  Profile cannot be deleted :( </div>";
                                } 
                            }
                            
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
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35" style="background-color: whitesmoke;"><input style="width:95%; min-height:50px;" type="Search" id="searchstudent" onkeyup="searchstudent()" placeholder="Search here..."><i class="fas fa-search"></i></h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                           <select class="js-select2" name="sections" id="secid" onchange="changedsections()">
                                                <option selected="selected" disabled>All Sections</option>
                                                <?php 
                                                   $sqlstring="SELECT * FROM sectiontbl";
                                                   $querystring=mysqli_query($con, $sqlstring);
                                                   while($row=mysqli_fetch_array($querystring)){
                                                ?>
                                                <option value="<?php echo $row['sectionid']; ?>"><?php echo $row['sectionname']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Filters</button>                                       
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#add">
                                            <i class="zmdi zmdi-plus"></i>Add Student</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Pdf</option>
                                                <option value="">HTML</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">

                                  <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>Section</th>
                                              
                                                <th>Average Score</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="response">
                                        <?php
                                        $sql="SELECT userstbl.userid, userstbl.lname, userstbl.fname, userstbl.email, sectiontbl.sectionname, (SELECT averagescore FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS AverageScore,(SELECT remarks FROM scoretbl WHERE userstbl.userid=scoretbl.userid ) AS Remarks from userstbl left join sectiontbl on userstbl.sectionid=sectiontbl.sectionid  order by userstbl.lname";
                                        $result=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($result)){
                                        while($row = mysqli_fetch_array($result))
                                        {?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                               <?php echo "<td>".$row['lname'].", ".$row['fname']."</td>"; ?>
                                               <?php echo "<td>".$row['email']."</td>";?>
                                               <?php echo "<td>".$row['sectionname']."</td>";?>
                                                
                                                <td>
                                                    <span <?php 
                                                    if($row['Remarks']=='PASSED'){
                                                        echo 'class="status--process"'; } 
                                                     else{
                                                        echo 'class="status--denied"';
                                                     }
                                                     ?> >
                                                     <?php echo $row['AverageScore']; ?>% <?php echo $row['Remarks']; ?></span>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button onclick="setmodalid(<?php echo $row['userid']; ?>)" class="item" data-toggle="modal" data-placement="top" title="Send Notification" type="button" data-target="#sendnotif">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button type="button" onclick="editstudent(<?php echo $row['userid']; ?>)" class="item" data-placement="top" title="Edit"  data-toggle="modal" data-target="#add">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <a href="<?php echo "process2.php?deletestudent=1&id=".$row['userid'] ?>">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button></a>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php      

                                        }
                                    }else{
                                        echo "<tr><td></td><td></td><td>No data Found</td><td></td><td></td><td></td>
                                        </tr>";
                                    }

                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                          
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
                
                <form action="adduser.php" method="POST">
                    <input type="hidden" name="hiddenuserid" id="hiddenuserid">
                    <table border="0" style="border-collapse: collapse;">
                    <tr><td>Email:</td><td><input type="email"  name="email" id="email" placeholder="Enter Email" required></td></tr>
                    <tr><td>Password:</td><td><input type="password" name="password" id="password" placeholder="Enter Password " required></td></tr>
                    <tr><td>Firstname:</td><td><input type="text"  name="fname" id="fname" placeholder="Enter Firstname" required></td></tr>
                    <tr><td>Lastname:</td><td><input type="text"  name="lname" id="lname" placeholder="Enter Lastname" required></td></tr>
                    <tr><td>Middlename: &nbsp&nbsp&nbsp</td><td><input type="text"  name="mname" id="mname" placeholder="Enter Middlename"></td></tr>
                   <tr><td>Section:</td><td><select name="sectionid" id="sec" required>
                        <option id="sectionselected" selected readonly>Choose Section</option>
                           <?php 
                           $sql="SELECT * from sectiontbl";
                           $result=mysqli_query($con, $sql);
                           if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_array($result))
                            { 
                           ?>
                            <option value="<?php echo $row['sectionid'] ?>"><?php echo $row['sectionname'] ?></option>
                            <?php }
                            }?>
                    </select></td></tr>
                  </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" id="submitbtn" class="btn btn-success" style="display: inline" name="addstudentsubmit">Submit</button> &nbsp 
                <button type="submit" id="savebtn" class="btn btn-warning" style="display: none" name="editstudentsubmit">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
                
                
            </div>
        </div>
    </div>
 </div>
</div>
<!-- /MODAL ADD -->

 <!-- modal medium -->
    <div class="modal fade" id="sendnotif" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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

</html>
<!-- end document-->
