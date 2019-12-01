<?php
include('connection.php');
include('functions.php');
include('adminsession.php');

?>
<!DOCTYPE html>
<php lang="en">

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
    </script>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Admin Admin">
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
                            <h2>Students</h2><hr/><br/>
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
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send Notifications">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button type="button" onclick="editstudent(<?php echo $row['userid']; ?>)" class="item" data-placement="top" title="Edit"  data-toggle="modal" data-target="#edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
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
                <h6 class="modal-title">Add Student</h6>
                
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                
                <form action="adduser.php" method="POST">
                    <input type="email"  name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="text"  name="fname" placeholder="Firstname" required>
                    <input type="text"  name="lname" placeholder="Lastname" required>
                    <input type="text"  name="mname" placeholder="Middlename">
                   <select name="sectionid" required>
                     <option selected disabled>Choose Section</option>
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
                    </select>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" id="" class="btn btn-success" >Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
                
                
            </div>
        </div>
    </div>
 </div>
</div>
<!-- /MODAL ADD -->

<!-- MODAL ADD -->
<div class="add-user-modal">
 <div class="modal" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Edit Student</h6>
                
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php  $id=$_GET['userid']; $query="SELECT * FROM userstbl where userid=$userid";
                $result=mysqli_query($con, $sql);
                
                ?>
                <form action="editusers.php" method="POST">
                    <input type="hidden" name="userid" value="<?php echo $fetch['userid']?>">
                    <input type="email"  name="email" placeholder="Email" value="<?php echo $fetch['email']?>">
                    <input type="password" name="password" placeholder="Password" value="<?php echo $fetch['password']?>">
                    <input type="text"  name="fname" placeholder="Firstname" value="<?php echo $fetch['fname']?>">
                    <input type="text"  name="lname" placeholder="Lastname" value="<?php echo $fetch['lname']?>">
                    <input type="text"  name="mname" placeholder="Middlename" value="<?php echo $fetch['mname']?>">
                   <select name="sectionid">
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
                    </select>
                   
             
                    

                    
                    

                
                
            
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" id="" class="btn btn-success" >Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
                
                
            </div>
        </div>
    </div>
 </div>
</div>
<!-- /MODAL ADD -->

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
