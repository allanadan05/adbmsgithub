<?php
include('connection.php');
include('adminsession.php');
include('functions.php');
$_SESSION['sidebar']="students";


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script>
        function changedsections() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("response").innerHTML = this.responseText;
                }
            };
            var secid = document.getElementById('secid').value;
            //document.write(forIpinasa);
            var palatandaan = "changedsec";
            xhttp.open("GET", "process2.php?secid=" + secid + "&palatandaan=" + palatandaan, true);
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
            //document.write(forIpinasa);
            var palatandaan = "searchstudent";
            xhttp.open("GET", "process2.php?tosearch=" + tosearch + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        function editstudent(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    // document.write(id);
                    document.getElementById("modaltitle").innerHTML = "EDIT Student";
                    document.getElementById("submitbtn").style.display = "none";
                    document.getElementById("savebtn").style.display = "inline";
                    document.getElementById("hiddenuserid").value = forwardedid;
                    var buongObject = JSON.parse(this.responseText);
                    //document.getElementById("response").innerHTML = buongObject.sname;
                    document.getElementById("hiddenuserid").value = buongObject.hiddenuserid;
                    document.getElementById("email").value = buongObject.email;
                    document.getElementById("password").value = buongObject.password;
                    document.getElementById("lname").value = buongObject.lname;
                    document.getElementById("fname").value = buongObject.fname;
                    document.getElementById("mname").value = buongObject.mname;
                    var imgStud = document.getElementById("resultimage").value = buongObject
                    .resultimage; // result image
                    if (imgStud) {
                        var imgStud = document.getElementById("resultimage").value = "Image Name: " + buongObject
                            .resultimage;
                        //var resultimg = document.getElementById("displayimage").innerHTML = "Image Name: "+  imgStud ;
                    } else {
                        var imgStud = document.getElementById("resultimage").value = "Image Name: None";
                        //var resultimg = document.getElementById("displayimage").innerHTML = "Image Name: None";
                    }
                    var seeimg = document.getElementById("showStudtimage").style.display = "inline";
                    document.getElementById("sectionselected").label = buongObject.sectionname;
                    document.getElementById("sectionselected").value = buongObject.sectionid;
                }
            }
            var forwardedid = id;
            //document.write(forwardedid);
            var palatandaan = "editstudent";
            xhttp.open("GET", "process2.php?forwardedid=" + forwardedid + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        function setmodalid(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var objStud = JSON.parse(this.responseText);
                    var lname = document.getElementById("studlname").value = objStud.lname;
                    var fname = document.getElementById("studfname").value = objStud.fname;
                    var mname = document.getElementById("studmname").value = objStud.mname;
                    var fullName = lname + ', ' + fname + ' ' + mname + ' ';
                    document.getElementById('fullName').innerHTML = fullName;
                }
            }
            var tokenStudName = "fullName";
            var idStudName = id;
            xmlhttp.open("GET", "process3.php?id=" + idStudName + "&tokenStudName=" + tokenStudName, true);
            xmlhttp.send();
            document.getElementById("hiddensendid").value = id;
        }
    </script>

    <!--new line code-->
    <!--validation student-->

    <script>
        function validEmail() {
            var checkEmail = document.getElementById("chkEmail");
            var myEmail = document.getElementById("email").value;
            if (myEmail != "") {
                checkEmail.innerHTML = "Checking...";
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "process3.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        checkEmail.innerHTML = xhttp.responseText;
                    }
                }
                var postEmail = "chEm=" + myEmail;
                xhttp.send(postEmail);
            } else {
                checkEmail.innerHTML = "";
            }
        }

        function tooShortPassword() {
            var tooShortPwd = document.getElementById("chkpwd");
            var pwd = document.getElementById("password").value;
            if (pwd != "") {
                tooShortPwd.innerHTML = "Checking...";
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "process3.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        tooShortPwd.innerHTML = xhttp.responseText;
                    }
                }
                var postPwd = "chpwd=" + pwd;
                xhttp.send(postPwd);
            } else {
                tooShortPwd.innerHTML = "";
            }
        }
        // this code work deleted multiple
        //click all checkboxes
        function checkboxes_deleted() {
            document.getElementById("showBtn").style.display = "inline";
            document.getElementById("oneButtonDel").style.display = "none";
        }
        //click all checkboxes
        //----
        // one selected button only show button
        function oneCheckBoxes() {
            document.getElementById("oneButtonDel").style.display = "inline";
            document.getElementById("showBtn").style.display = "none";
        }
        // one selected button only show button
        function multiple_ajax_del() {
            var eachCheckBoxes = null;
            var eachCheckBoxesElements = document.getElementsByName("num[]");
            for (var i = 0; eachCheckBoxesElements[i]; ++i) {
                if (eachCheckBoxesElements[i].checked) {
                    eachCheckBoxes = eachCheckBoxesElements[i].value;
                    delete_each_value(eachCheckBoxes);
                    //alert(eachCheckBoxes);
                }
            }
        }
        // multiple delete each boxes
        // process2.php
        //delete_each_value();
        function delete_each_value(eachCheckBoxes) {
            //alert("clickDeletedniya");
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('response').innerHTML = this.responseText; // refresh table purpose niya
                }
            }
            // document.getElementById("delSuccess").style.display="inline"; // print delete successfully
            //document.getElementById("showDeleted").style.display="inline";
            var mul_del = "ajaxMulitpleDeleteStudents";
            xmlhttp.open("GET", "process2.php?id=" + eachCheckBoxes + "&mul_delStudents=" + mul_del, true);
            xmlhttp.send();
            window.location.reload();
            // process2.php
            /*
            setTimeout(function(){
                window.location.reload(); 
            },1000); // 2 seconds
            */
            /*
             var timeleft = 3 ;
             var downloadTimer  =  setInterval(function(){
                 timeleft--;
                 document.getElementById('delSuccess').textContent = timeleft;
                 if(timeleft <=0)
                     clearInterval(downloadTimer);
                     // setTimeout para refresh page
                     setTimeout(function(){
                      window.location.reload(); 
                      },3000); // 3 seconds 
             },1000);
             */
        }
        // this code work deleted multiple
        // for modal button close
        function addstudBtn() {
            document.getElementById("submitbtn").style.display = "inline";
            document.getElementById("savebtn").style.display = "none";
        }
        // for modal buton close
    </script>

    <!--new line code-->
    <!--validation student-->

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
                            <h2>Students</h2>
                            <hr />
                            <?php
                            
                             if(isset($_GET['editstudentresult'])){
                                $editstudentresult=$_GET['editstudentresult'];
                                if($editstudentresult=="success"){
                               // echo "<div class='alert alert-primary' role='alert'> Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." has been updated :) </div>";
                               echo "<div class='alert alert-primary' role='alert'> Profile has been updated :) </div>";
                                }
                                if($editstudentresult=="failed"){
                                //echo "<div class='alert alert-danger' role='alert'>  Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." cannot be updated :( </div>";
                                echo "<div class='alert alert-primary' role='alert'> cannot be updated :( </div>";
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
                        echo "<div class='alert alert-success' role='alert'>Add Record Successfully</div>";
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
                            <!--ajax multiple delete-->
                            <!--div id="showDeleted" style="display:none;" class='alert alert-danger' role='alert'>Delete Successfully.. Please wait in <span id="delSuccess" style="display:none;">3</span> seconds</div-->
                            <!--ajax multiple delete-->
                            <div class="row">
                                <div class="col-md-10">

                                    <!-- DATA TABLE -->
                                    <h3 class="title-5 m-b-35" style="background-color: whitesmoke;"><input
                                            style="width:95%; min-height:50px;" type="Search" id="searchstudent"
                                            onkeyup="searchstudent()" placeholder="Search here..."><i
                                            class="fas fa-search"></i></h3>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" name="sections" id="secid"
                                                    onchange="changedsections()">
                                                    <option selected="selected" disabled>All Sections</option>
                                                    <?php 
                                                   $sqlstring="SELECT * FROM sectiontbl";
                                                   $querystring=mysqli_query($con, $sqlstring);
                                                   while($row=mysqli_fetch_array($querystring)){
                                                ?>
                                                    <option value="<?php echo $row['sectionid']; ?>">
                                                        <?php echo $row['sectionname']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <button class="au-btn-filter">
                                                <i class="zmdi zmdi-filter-list"></i>Filters</button>
                                        </div>
                                        <!-- MULTIPLE DELETED-->
                                        <!--showed button Deleted-->
                                        <button onclick="multiple_ajax_del();" style="display:none;" id="showBtn"
                                            class="btn btn-danger" type="button"><span
                                                class="zmdi zmdi-delete"></span></button>
                                        <!--showed button Deleted-->
                                        <!-- MULTIPLE DELETED-->

                                        <!--ONE CHECK DELETE BUTTON-->
                                        <!--showed button Deleted-->
                                        <button onclick="multiple_ajax_del();" style="display:none;" id="oneButtonDel"
                                            class="btn btn-danger" type="button"><span
                                                class="zmdi zmdi-delete"></span></button>
                                        <!--showed button Deleted-->
                                        <!--ONE CHECK DELETE BUTTON-->
                                        <div class="table-data__tool-right">
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small"
                                                data-toggle="modal" data-target="#add">
                                                <i class="zmdi zmdi-plus"></i>Add Student</button>
                                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                <select class="js-select2" name="type" onchange="location=this.value">
                                                    <option selected="selected">Export</option>
                                                    <option value="adminstudentpdf.php">Pdf</option>
                                                    <!--option value="">HTML</option-->
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive table-responsive-data2"
                                        style="overflow-x: scroll; overflow-y: hidden; width:970px;">
                                        <table class="table table-data2 table-responsive-data2">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="au-checkbox">
                                                            <input onclick="checkboxes_deleted();" id="checkall"
                                                                type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>

                                                    </th>
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
                                        
                                        $num_of_page = 05; // limit ng page niya sa table
                                        $start_from= ($page-1)*06;                                      
                                       //pagination
                                       
                                        $sql="select userstbl.userid, userstbl.sectionid, userstbl.lname, userstbl.fname, userstbl.email, userstbl.image, userstbl.sectionid, 
                                        (select sectionname from sectiontbl where userstbl.sectionid=sectiontbl.sectionid) AS sectionname,
                                         (select sum(averagescore)/count(averagescore) from scoretbl where userstbl.userid=scoretbl.userid) AS averagescore
                                          from userstbl order by userstbl.lname limit $start_from,$num_of_page";
                                        $result=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($result)){
                                        while($row = mysqli_fetch_array($result))
                                        {?>

                                                <tr class="tr-shadow">
                                                    <div id="showDel">
                                                        <td>
                                                            <label class="au-checkbox">
                                                                <input onclick="oneCheckBoxes();" id="oneButtonDel"
                                                                    name="num[]" class="checkitem" type="checkbox"
                                                                    value="<?php echo $row["userid"];?>">
                                                                <span class="au-checkmark"></span>
                                                            </label>
                                                        </td>
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
                                                            <button type="button"
                                                                onclick="editstudent(<?php echo $row['userid']; ?>)"
                                                                class="item" data-placement="top" title="Edit"
                                                                data-toggle="modal" data-target="#add">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                            <a
                                                                href="<?php echo "process2.php?deletestudent=1&id=".$row['userid'] ?>">
                                                                <button class="item" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </button></a>
                                                            <button class="item" data-toggle="tooltip"
                                                                data-placement="top" title="More">
                                                                <i class="zmdi zmdi-more"></i>
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
                                            echo "<a class='btn btn-warning' href='adminstudents.php?page=".($page-1)."'>Previous</a>";
                                        }
                                      for($i=1;$i<$totalPage;$i++)
                                        {
                                            echo "<a class='btn btn-info' href='adminstudents.php?page=".$i."'>$i</a>";
                                        }
                                        if($page>1)
                                        {
                                            echo "<a class='btn btn-primary' href='adminstudents.php?page=".($page+1)."'>Next</a>";
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
                            <button type="submit" id="savebtn" class="btn btn-warning" style="display: none;"
                                name="editstudentsubmit">Save</button>
                            <!--button onclick="addstudBtn();" type="button" class="btn btn-danger" data-dismiss="modal">Close</button-->
                            <a class="btn btn-danger" data-dismiss="modal" href="adminstudents.php">Close</a>
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
                            <h5 id="fullName"></h5><input type="date" name="dateposted"
                                value="<?php echo date("Y-m-d"); ?>" style="display:inline;" readonly>
                            <!-- print name student-->
                            <!--input type="text" name="anfrom" value="" style="display:inline;" readonly-->
                            <!--input type="text" name="anfrom" value="<?php //echo teachersgetname($id);?>" style="display:inline;" readonly-->
                            <input type="hidden" id="studlname" name="lstudName" value="" style="display:none;">
                            <input type="hidden" id="studfname" name="fstudName" value="" style="display:none;">
                            <input type="hidden" id="studmname" name="mstudName" value="" style="display:none;">
                            <!--print name student-->

                            <h5 class="modal-title" id="mediumModalLabel"><input type="text" name="antitle"
                                    placeholder="Type Title here..."></h5>
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