<?php
include('connection.php');
include('adminsession.php');
include('functions.php');
$_SESSION['sidebar']="teachers";

if($_SESSION['access']=="admin"){

}else{
    header("Location: index.php?login=access");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script>
        function changeddepartment() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("response").innerHTML = this.responseText;
                }
            };
            var secid = document.getElementById('secid').value;
            //document.write(secid);
            var palatandaan = "changeddepartment";
            xhttp.open("GET", "process2.php?secid=" + secid + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        function searchteachers() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("response").innerHTML = this.responseText;
                }
            };
            var tosearch = document.getElementById('searchteachers').value;
            //document.write(forIpinasa);
            var palatandaan = "searchteachers";
            xhttp.open("GET", "process2.php?tosearch=" + tosearch + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        function editsteacher(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("modaltitleadd").style.display = "none";
                    document.getElementById("modaltitleedit").style.display = "inline";
                    document.getElementById("hiddenuserid").value = forwardedid;
                    document.getElementById("submitbtn").style.display = "none";
                    document.getElementById("savebtn").style.display = "inline";
                  
                    var buongObject = JSON.parse(this.responseText);
                    document.getElementById("email").value = buongObject.email;
                    document.getElementById("password").value = buongObject.password;
                    document.getElementById("lname").value = buongObject.lname;
                    document.getElementById("fname").value = buongObject.fname;
                    document.getElementById("mname").value = buongObject.mname;
                    var imgStud = document.getElementById("resultimage").value = buongObject
                    .resultimage; // result image
                    if (imgStud) {
                        var imgStud = document.getElementById("resultimage").innerHTML = "Image Name: " + buongObject.resultimage;
                        //var resultimg = document.getElementById("displayimage").innerHTML = "Image Name: "+  imgStud ;
                    } else {
                        var imgStud = document.getElementById("resultimage").innerHTML = "Image Name: None";
                        
                        //var resultimg = document.getElementById("displayimage").innerHTML = "Image Name: None";
                    }
                    var seeimg = document.getElementById("showStudtimage").style.display = "inline";
                    
                    // section id
                    var getDeptId = document.getElementById("SearchteachersdeptId").value = buongObject
                        .SearchteachersdeptId;
                    var setDeptId = getDeptId; // hold value 
                    //document.getElementById("teachersdeptId").value = setDeptId ;
                    //document.write(getDeptId);                
                    // section id
                    document.getElementById("sectionselected1").value = buongObject.deptid;
                    document.getElementById("sectionselected1").label = buongObject.departmentname;
                    document.getElementById("sectionselected2").value = buongObject.sectionid;
                    document.getElementById("sectionselected2").label = buongObject.sectionname;
                }
            };
            var forwardedid = id;
            //document.write(forwardedid);
            var palatandaan = "editsteacher";
            xhttp.open("GET", "processj.php?forwardedid=" + forwardedid + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        function showassignedsubjects(teachersid) {
            //document.getElementById("hiddensendid").value=id;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("subjectscheckboxes").innerHTML = this.responseText;
                    document.getElementById("hiddensendid").value = teachersid;
                }
            };
            var teachersid = teachersid;
            var palatandaan = "showassignedsubjects";
            xhttp.open("GET", "process.php?palatandaan=" + palatandaan + "&teachersid=" + teachersid, true);
            xhttp.send();
        }

        function addteacher() {
            document.getElementById("modaltitleadd").style.display = "inline";
            document.getElementById("modaltitleedit").style.display = "none";
        }

        function assignsubjecttoteacher(subid, teachersid) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    // window.alert(this.responseText);
                }
            };
            var subid = subid;
            var teachersid = teachersid;
            var palatandaan = "assignsubjecttoteacher";
            xhttp.open("GET", "process.php?palatandaan=" + palatandaan + "&subid=" + subid + "&teachersid=" +
                teachersid, true);
            xhttp.send();
        }
    </script>

    <!-- new line code-->
    <script>
        //validation for teachers

        function validEmail()
        {
            
            var myEmail = document.getElementById("email").value;
            var checkEmail = document.getElementById("chkEmail");

            if(myEmail!="")
            {
                checkEmail.innerHTML = "Checking...";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST","process3.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        checkEmail.innerHTML = xmlhttp.responseText;
                    }
                }
                var postEmail = "chkEmail=" +myEmail;
                xmlhttp.send(postEmail);
            }
            else {
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
                var postPwd = "chpwdTeacher=" + pwd;
                xhttp.send(postPwd);
            } else {
                tooShortPwd.innerHTML = "";
            }
        }

           // firstname validation
           function fnameValid() 
        {
          var sFname = document.getElementById("checkfname");
          var rfname = document.getElementById("fname").value;
              if(rfname != "")
                  {

                    sFname.innerHTML="Checking...";
                    var xhttpF = new XMLHttpRequest();
                    xhttpF.open("POST","process3.php",true);
                    xhttpF.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xhttpF.onreadystatechange = function()
                    {
                        if(xhttpF.readyState == 4 && xhttpF.status == 200)
                        {
                          sFname.innerHTML=xhttpF.responseText;
                        }
    
                    }
                        var f = "checkFn="+rfname;
                        xhttpF.send(f);
                  }
              else{
                sFname.innerHTML="";
              }

        }
            // firstname validation

            // lastname validation
            function lnameValid() 
        {
          var sLname = document.getElementById("checklname");
          var rlname = document.getElementById("lname").value;
              if(rlname != "")
                  {

                    sLname.innerHTML="Checking...";
                    var xhttpL = new XMLHttpRequest();
                    xhttpL.open("POST","process3.php",true);
                    xhttpL.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xhttpL.onreadystatechange = function()
                    {
                        if(xhttpL.readyState == 4 && xhttpL.status == 200)
                        {
                          sLname.innerHTML=xhttpL.responseText;
                        }
    
                    }
                        var l = "checkLn="+rlname;
                        xhttpL.send(l);
                  }
              else{
                sLname.innerHTML="";
              }

        }
            // last name validation

            // mname validation
            function mnameValid() 
        {
          var sMname = document.getElementById("checkmname");
          var rmname = document.getElementById("mname").value;
              if(rmname != "")
                  {

                    sMname.innerHTML="Checking...";
                    var xhttpM = new XMLHttpRequest();
                    xhttpM.open("POST","process3.php",true);
                    xhttpM.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xhttpM.onreadystatechange = function()
                    {
                        if(xhttpM.readyState == 4 && xhttpM.status == 200)
                        {
                          sMname.innerHTML=xhttpM.responseText;
                        }
    
                    }
                        var m = "checkMn="+rmname;
                        xhttpM.send(m);
                  }
              else{
                sMname.innerHTML="";
              }
        }
        //mname validation


        // validation for teachers
        //click all checkboxes
        function checkboxes_deleted() {
            document.getElementById("showBtn").style.display = "inline";
            document.getElementById("oneButtonDel").style.display = "none";
        }
        //click all checkboxes
        function oneCheckBoxes() {
            document.getElementById("oneButtonDel").style.display = "inline";
            document.getElementById("showBtn").style.display = "none";
        }

        function multiple_ajax_del() {
            //alert("click");
            var eachCheckBoxes = null;
            var eachCheckBoxesElements = document.getElementsByName('num[]');
            for (var i = 0; eachCheckBoxesElements[i]; ++i) {
                //alert(eachCheckBoxesElements[i].checked); // true
                if (eachCheckBoxesElements[i].checked) {
                    eachCheckBoxes = eachCheckBoxesElements[i].value;
                    //alert(eachCheckBoxes);
                    delete_each_value(eachCheckBoxes);
                }
            }
        }

        function delete_each_value(eachCheckBoxes) {
            //alert("clickDeletedniya");
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('response').innerHTML = this.responseText; // refresh table purpose niya
                }
            }
            var mul_del = "ajaxMulitpleDeleteTeachers";
            xmlhttp.open("GET", "process2.php?id=" + eachCheckBoxes + "&mul_delTeachers=" + mul_del, true);
            xmlhttp.send();
            window.location.reload();
        }
    </script>
    <!-- new line code-->

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
                            <h2>Teachers</h2>
                            <hr />
                            <?php
                             if(isset($_GET['editstudentresult'])){
                                $editstudentresult=$_GET['editstudentresult'];
                                if($editstudentresult=="success"){
                                //echo "<div class='alert alert-primary' role='alert'> Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." has been updated :) </div>";
                                echo "<div class='alert alert-primary' role='alert'> Profile has been updated :) </div>";
                                }
                                if($editstudentresult=="failed"){
                                //echo "<div class='alert alert-danger' role='alert'>  Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." cannot be updated :( </div>";
                                echo "<div class='alert alert-primary' role='alert'> Profile cannot be updated :( </div>";
                                } 
                            }
                            
                            if(isset($_GET['deleteteacherresult'])){
                                $deleteteacherresult=$_GET['deleteteacherresult'];
                                if($deleteteacherresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> Profile has been deleted :) </div>";
                                }
                                if($deleteteacherresult=="failed"){
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

                            // addteachers.php
                            if(isset($_GET['password']) && $_GET['password']=="tooShort")
                            {
                                echo "<div class='alert alert-danger' role='alert'>Password must be more than 4 characters </div>";
                            }
                             if(isset($_GET['exist']) && $_GET['exist']=="email") 
                            {
                              echo "<div class='alert alert-danger' role='alert'>Email already exist </div>";
                            }
                            if(isset($_GET['new']) && $_GET['new']=="teacher")
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

                            // full name validation
                            if(isset($_GET['fname']) && $_GET['fname']=="numberCannotAccept") 
                            {
                            echo "<div class='alert alert-danger' role='alert'>Firstname character must be a letter </div>";
                            }
                            if(isset($_GET['lname']) && $_GET['lname']=="numberCannotAccept") 
                            {
                            echo "<div class='alert alert-danger' role='alert'>Lastname character must be a letter </div>";
                            } 
                            if(isset($_GET['mname']) && $_GET['mname']=="numberCannotAccept") 
                            {
                            echo "<div class='alert alert-danger' role='alert'>Middlename character must be a letter </div>";
                            }
                            
                            // limit 2 characters
                            if(isset($_GET['fname']) && $_GET['fname']=="tooShort")
                            {
                                echo "<div class='alert alert-danger' role='alert'>Firstname must be more than 2 characters </div>";
                            }
                            if(isset($_GET['lname']) && $_GET['lname']=="tooShort")
                            {
                                echo "<div class='alert alert-danger' role='alert'>lastname must be more than 2 characters </div>";
                            }
                            if(isset($_GET['mname']) && $_GET['mname']=="tooShort")
                            {
                                echo "<div class='alert alert-danger' role='alert'>Middlename must be more than 2 characters </div>";
                            }
                            // limit 2 characters

                            // full name validation

                            //addteachers.php
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                               
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="sections" id="secid"
                                                onchange="changeddepartment()">
                                                <option value="0" selected="selected" disabled>All Departments</option>
                                                <?php 
                                                   $sqlstring="SELECT * FROM departmenttbl";
                                                   $querystring=mysqli_query($con, $sqlstring);
                                                   while($row=mysqli_fetch_array($querystring)){
                                                ?>
                                                <option value="<?php echo $row['deptid']; ?>">
                                                    <?php echo $row['departmentname']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Filters</button>
                                    </div>

                                    <!-- MULTIPLE DELETED-->
                                    <!--showed button Deleted-->
                                    <button onclick="multiple_ajax_del()" style="display:none;" id="showBtn"
                                        class="btn btn-danger" type="button"><span
                                            class="zmdi zmdi-delete"></span></button>
                                    <!--showed button Deleted-->
                                    <!-- MULTIPLE DELETED-->

                                    <!--ONE CHECK DELETE BUTTON-->
                                    <!--showed button Deleted-->
                                    <button onclick="multiple_ajax_del()" style="display:none;" id="oneButtonDel"
                                        class="btn btn-danger" type="button"><span
                                            class="zmdi zmdi-delete"></span></button>
                                    <!--showed button Deleted-->
                                    <!--ONE CHECK DELETE BUTTON-->

                                    <div class="table-data__tool-right">
                                        <button onclick="addteacher()"
                                            class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                                            data-target="#add">
                                            <i class="zmdi zmdi-plus"></i>Add Teacher</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type" onchange="location=this.value">
                                                <option selected="selected">Export</option>
                                                <option value="adminteacherpdf.php">Pdf</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="title-5 m-b-35" style="background-color: whitesmoke;"><input
                                        style="width:95%; min-height:50px;" type="Search" id="searchteachers"
                                        onkeyup="searchteachers()" placeholder="Search here..."><i
                                        class="fas fa-search"></i></h3>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input onclick="checkboxes_deleted();" type="checkbox"
                                                            id="checkall">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>department</th>
                                                <th>#subjects enrolled</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="response">
                                            <!--pagination-->
                                            <?php
                                        /*
                                        $sql="select teachersid, concat(lname, ', ', fname , ' ', mname) AS name, email, 
                                        (SELECT departmentname from departmenttbl WHERE deptid=teacherstbl.deptid) AS departmentname, 
                                        (SELECT count(subjectid) from teachersubjecttbl where teachersid=teacherstbl.teachersid) AS NoOfSubject 
                                        FROM teacherstbl order by teacherstbl.lname";
                                        */
                                        if(isset($_GET['page']))
                                        {
                                            $page = $_GET['page'];
                                        }
                                         else
                                        {
                                            $page = 1;
                                        }
                                        
                                        $num_of_page = 05; // limit ng page niya sa table
                                        $start_from= ($page-1)*05;                                      
                                       //pagination
                                        
                                        ?>
                                            <!--pagination-->

                                            <?php
                                        $sql="select teachersid,deptid, concat(lname, ', ', fname , ' ', mname) AS name, email, image, 
                                        (SELECT departmentname from departmenttbl WHERE deptid=teacherstbl.deptid) AS departmentname, 
                                        (SELECT count(subjectid) from teachersubjecttbl where teachersid=teacherstbl.teachersid) AS NoOfSubject 
                                        FROM teacherstbl order by teacherstbl.lname limit $start_from,$num_of_page";
                                        $result=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($result)){
                                        while($row = mysqli_fetch_array($result))
                                        {?>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input onclick="oneCheckBoxes();" name="num[]" class="checkitem"
                                                            type="checkbox" value="<?php echo $row["teachersid"]; ?>">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>

                                                <?php echo "<td style='display:none;' id='SearchteachersdeptId'>".$row['deptid']."</td>";?>
                                                <?php echo "<td>".$row['name']."</td>";?>
                                                <?php echo "<td>".$row['email']."</td>";?>
                                                <?php echo "<td>".$row['departmentname']."</td>";?>
                                                <?php echo "<td>".$row['NoOfSubject']."</td>";?>
                                                <td>
                                                        <img style="width: 30px; height: 30px; border-radius: 100px;"
                                                            onerror="this.src='images/defaultpic/defaultPIC.png'"
                                                            src="<?php echo "images/teacher_picture/".$row['image']."";?>">
                                                    </td>                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button
                                                            onclick="showassignedsubjects(<?php echo $row['teachersid']; ?>)"
                                                            class="item" data-toggle="modal" data-placement="top"
                                                            title="Assigned Subject/s" type="button"
                                                            data-target="#sendnotif">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                        <button type="button"
                                                            onclick="editsteacher(<?php echo $row['teachersid']; ?>)"
                                                            class="item" data-placement="top" title="Edit"
                                                            data-toggle="modal" data-target="#add">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <a
                                                            href="<?php echo "processj.php?deleteteachers=1&id=".$row['teachersid'] ?>">
                                                            <button class="item" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
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
                                    <?php
                                    //buttons page pagination
                                
                                    $perpage="select teachersid, concat(lname, ', ', fname , ' ', mname) AS name, email, 
                                    (SELECT departmentname from departmenttbl WHERE deptid=teacherstbl.deptid) AS departmentname, 
                                    (SELECT count(subjectid) from teachersubjecttbl where teachersid=teacherstbl.teachersid) AS NoOfSubject 
                                    FROM teacherstbl order by teacherstbl.lname";

                                      $perpageResult=mysqli_query($con,$perpage);
                                      $totalRecord=mysqli_num_rows($perpageResult);
                                        // note lang totalpage=ceil(rows/numpage) - ceil convert to decimal to integer
                                      $totalPage=ceil($totalRecord/$num_of_page);
                                        //echo $totalPage;
                                        if($page>1)
                                        {
                                            echo "<a class='btn btn-warning' href='adminteachers.php?page=".($page-1)."'>Previous</a>";
                                        }
                                      for($i=1;$i<$totalPage;$i++)
                                        {
                                            echo "<a class='btn btn-info' href='adminteachers.php?page=".$i."'>$i</a>";
                                        }
                                        if($totalPage)
                                        {
                                            echo "<a class='btn btn-info' href='adminteachers.php?page=".$i."'>$i</a>";
                                        }
                                        if($i>$page)
                                        {
                                            echo "<a class='btn btn-primary' href='adminteachers.php?page=".($page+1)."'>Next</a>";
                                        }
                                    //buttons page pagination                                      
                                    ?>

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
    <div class="add-teacher-modal">
        <div class="modal" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title" id="modaltitleadd">Add Teacher</h6>
                        <h6 class="modal-title" id="modaltitleedit" style="display:none;">Edit Teacher</h6>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form action="addteachers.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="hiddenuserid" id="hiddenuserid">
                            <!--dept id for teachers-->
                            <!--input type="hidden" name="teachersdeptId" id="teachersdeptId"-->
                            <!--dept id for teachers-->
                            <table border="0" style="border-collapse: collapse;">
                            <div style="display:none;" id="showStudtimage">
                            <div id="resultimage"></div>
                            </div>
                                <tr>
                                  <td>Image:</td>
                                  <td><input type="file" name="image" id="image" accept="image/*">      
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" name="email" id="email" placeholder="Enter Email" maxlength="30" onkeyup="validEmail()"
                                     required>
                                    </td>
                                    <span id="chkEmail"></span>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td><input type="password" name="password" id="password"
                                            placeholder="Enter Password " maxlength="30" onkeyup="tooShortPassword()" required>
                                            <span id="chkpwd"></span></td>
                                </tr>
                                
                                <tr>
                                    <td>Firstname:</td>
                                    <td><input type="text" name="fname" id="fname" placeholder="Enter Firstname" maxlength="30" onkeyup="fnameValid()"
                                            required><span id="checkfname"></span></td>
                                </tr>
                                <tr>
                                    <td>Lastname:</td>
                                    <td><input type="text" name="lname" id="lname" placeholder="Enter Lastname" maxlength="30" onkeyup="lnameValid()"
                                            required><span id="checklname"></span></td>
                                </tr>
                                <tr>
                                    <td>Middlename: &nbsp&nbsp&nbsp</td>
                                    <td><input type="text" name="mname" id="mname" placeholder="Enter Middlename" maxlength="30" onkeyup="mnameValid()">
                                    <span id="checkmname"></span></td>
                                </tr>
                                <tr>
                                    <td>Department: &nbsp&nbsp&nbsp</td>
                                    <td> <select name="deptid" id="dep" required>
                                            <option value="0" id="sectionselected1" selected readonly>Choose Department</option>
                                            <?php 
                           $sql="SELECT * from departmenttbl";
                           $result=mysqli_query($con, $sql);
                           if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_array($result))
                            { 
                           ?>
                                            <option value="<?php echo $row['deptid'] ?>">
                                                <?php echo $row['departmentname'] ?></option>
                                            <?php }
                            }?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Section:</td>
                                    <td><select name="section" id="sec" required>
                                            <option value="0" id="sectionselected2" selected readonly>Choose Section</option>
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
                            name="addteachersubmit">Submit</button> &nbsp
                        <button type="submit" id="savebtn" class="btn btn-warning" style="display: none;"
                            name="editteachersubmit">Save</button>
                        <a class="btn btn-danger" data-dismiss="modal" href="adminteachers.php">Close</a>
                        <!--button onclick="addteachersBtn();" type="button" id="close-tbn" class="btn btn-danger" data-dismiss="modal">Close</button-->
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
        <div class="modal-dialog modal-medium" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <form action="addsub.php" method="POST">
                        <input type="hidden" name="hiddensendid" id="hiddensendid">
                        <h4>Subject/s</h4>

                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>
                                <!-- <select name="subject" id="addsubselect" required>
                        <option value="0" id="sectionselected" selected readonly disabled required>Choose Subject</option>  -->
                                <div id="subjectscheckboxes">
                                    <?php 
                           $sql="SELECT * from subjecttbl";
                           $result=mysqli_query($con, $sql);
                           if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_array($result))
                            { 
                           ?>
                                    <label>
                                        <input type="checkbox" value="<?php echo $row['subjectid']; ?>"
                                            name=" <?php echo $row['subjectname']; ?> " <?php
                                     $sqlss="SELECT * from teachersubjecttbl where subjectid=".$row['subjectid'];
                                     $resultss=mysqli_query($con, $sqlss);
                                     if(mysqli_num_rows($resultss)){
                                     while($rowss = mysqli_fetch_array($resultss)){
                                        if($rowss['teachersid'] == 1 ){
                                            echo "checked=checked";
                                        }
                                     }
                                    }
                            ?>> <!-- end tag of input -->
                                        <?php echo $row['subjectname']; ?>
                                    </label>
                                    <br>
                                    <?php }
                            }?>
                                    <!-- </select> -->
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" name="assignsubject" class="btn btn-warning" id="sendbtn"
                        onclick="history.go(0)">SAVE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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