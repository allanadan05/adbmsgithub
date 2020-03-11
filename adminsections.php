<?php
include('connection.php');
include('adminsession.php');
include('functions.php');



?>
<!DOCTYPE html>
<php lang="en">

<head>

    <script>
        function editsection(id){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) { 
                    var buongObject=JSON.parse(this.responseText);
                    //document.getElementById("response").innerHTML = buongObject.sname;
                    document.getElementById("addsecname").value = buongObject.secname;
                    document.getElementById("hiddenid").value = forwardedid;
                    document.getElementById("addsecbtn").style.display="none";
                    document.getElementById("editsecbtn").style.display="inline";
            }
          };
        $('html, body').animate({scrollTop:0}, 'fast');
        var forwardedid = id;
        //document.write(forwardedid);
        var palatandaan = "editsection";
        xhttp.open("GET", "process2.php?forwardedid="+forwardedid+"&palatandaan="+palatandaan, true);
        xhttp.send(); 
        }

        function editdept(id){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) { 
                    var buongObject=JSON.parse(this.responseText);
                    //document.getElementById("response").innerHTML = buongObject.sname;
                    document.getElementById("adddeptname").value = buongObject.deptname;
                    document.getElementById("hiddendeptid").value = forwardedid;
                    document.getElementById("adddeptbtn").style.display="none";
                    document.getElementById("editdeptbtn").style.display="inline";
            }
          };
        $('html, body').animate({scrollTop:0}, 'fast');
        var forwardedid = id;
        //document.write(forwardedid);
        var palatandaan = "editdept";
        xhttp.open("GET", "process2.php?forwardedid="+forwardedid+"&palatandaan="+palatandaan, true);
        xhttp.send(); 
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
    <style>
    i{
        font-size: 12px;
    }
    #del{
        background-color:#f54242;
        width: 60px;
        height: 30px;
        font-size: 12px;
        border-radius: 5px;
        color: white;
       
    }
    #update{
        background-color: #fcf003;
        width: 60px;
        height: 30px;
        font-size: 12px;
        border-radius: 5px;
        color: black;
    }
    
    
    
    </style>
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
                            <h2>Sections</h2><hr/><br/>
                            <?php 
                            if(isset($_GET['addsecresult'])){
                                $addsecresult=$_GET['addsecresult'];

                                if($addsecresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> New section: ".$_GET['secname']." has been added :) <br>NOTE: New sections are not official until you populate record atleast one.</div>";
                                }
                                if($addsecresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> New section: ".$_GET['secname']." cannot be added :(  <br>NOTE: New sections are not official until you populate record atleast one.</div>";
                                } 
                            }
                            if(isset($_GET['adddeptresult'])){
                                $adddeptresult=$_GET['adddeptresult'];

                                if($adddeptresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> New department: ".$_GET['secname']." has been added :) <br>NOTE: New departments are not official until you populate record atleast one.</div>";
                                }
                                if($adddeptresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> New department: ".$_GET['secname']." cannot be added :(  <br>NOTE: New departments are not official until you populate record atleast one.</div>";
                                } 
                            }
                            
                            if(isset($_GET['editsecresult'])){
                                $editsecresult=$_GET['editsecresult'];
                                if($editsecresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> Section name: ".$_GET['secname']." has been updated :) <br>NOTE: New departments are not official until you populate record atleast one.</div>";
                                }
                                if($editsecresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> Section name: ".$_GET['secname']." cannot be updated :(  <br>NOTE: New departments are not official until you populate record atleast one.</div>";
                                } 
                            }
                            if(isset($_GET['editdeptresult'])){
                                $editdeptresult=$_GET['editdeptresult'];
                                if($editdeptresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'> Department name: ".$_GET['deptname']." has been updated :) <br>NOTE: New departments are not official until you populate record atleast one.</div>";
                                }
                                if($editdeptresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> Department name: ".$_GET['deptname']." cannot be updated :(  <br>NOTE: New departments are not official until you populate record atleast one.</div>";
                                } 
                            }
                            if(isset($_GET['deletesecresult'])){
                                $deletesecresult=$_GET['deletesecresult'];
                                if($deletesecresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'>Deleted successfully!</div>";
                                }
                                if($deletesecresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> Sorry, cannot be deleted. </div>";
                                } 
                            }
                            
                            if(isset($_GET['deletedeptresultdeletedeptresult'])){
                                $deletedeptresult=$_GET['deletedeptresult'];
                                if($deletedeptresult=="success"){
                                echo "<div class='alert alert-primary' role='alert'>Deleted successfully!</div>";
                                }
                                if($deletedeptresult=="failed"){
                                echo "<div class='alert alert-danger' role='alert'> Sorry, cannot be deleted. </div>";
                                } 
                            }
                            
                            ?>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                   <form action="process2.php" method="POST">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href=""> ADD SECTION </a>
                                        </strong>
                                     </div>
                                    <div class="card-body">
                                        <strong class="card-title"><input type="text" name="newsectionname" id="addsecname" placeholder="Enter Section name" >
                                        <input type="hidden" name="hiddenname" id="hiddenid">
                                        </strong>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" style="float:right; display: inline;" name="addsection" id="addsecbtn" type="submit"><i class="fas fa-plus"></i>ADD</button>
                                        <button type="submit" class="btn btn-warning" style="float:right; display: none;" name="editsecsubmit" id="editsecbtn"><i class="fas fa-save"></i> SAVE</button>
                                    </div>
                                </div> 
                            </form>
                            </div>

                            <div class="col-md-4">
                                    <form action="process2.php" method="POST">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="#"> ADD DEPARTMENT </a>
                                        </strong>
                                     </div>
                                    <div class="card-body">
                                        <strong class="card-title"> <input type="text" name="newdeptname" id="adddeptname" placeholder="Enter deaprtment name" autofocus="autofocus"> </a>
                                        <input type="hidden" name="hiddendeptname" id="hiddendeptid">
                                        </strong>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" style="float:right; display: inline;" type="submit" name="adddept" id="adddeptbtn"><i class="fas fa-plus"></i>ADD</button>
                                         <button type="submit" class="btn btn-warning" style="float:right; display: none;"  name="editdeptsubmit" id="editdeptbtn"><i class="fas fa-save"></i> SAVE</button>
                                    </div>
                                </div> 
                                    </form>
                            </div>
                        </div>

                        <div class="row">

                            <!-- Start List of Sections-->
                               <div class="col-md-6"> 
                                <div class="top-campaign">
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <tr>
                                                    <th>Section name</th>
                                                    <th># of population</th>
                                                    <th colspan="2" style="text-align: left;">Actions</th>
                                                </tr>
                                                <?php
                                                

                                                $sql="SELECT sectiontbl.sectionid, sectiontbl.sectionname,count(userstbl.userid) as 'number of students' from userstbl join sectiontbl on userstbl.sectionid=sectiontbl.sectionid group by sectiontbl.sectionname ";
                                                $result=mysqli_query($con, $sql);

                                                if(mysqli_num_rows($result)){
                                                while($row = mysqli_fetch_array($result))
                                                {?>
                                                   
                                                <tr>
                                              <?php  echo "<td>".$row['sectionname']."</td>"; ?>
                                              <?php  echo "<td>".$row['number of students']."</td>"; ?>
                                                    <td><button class="btn btn-sm btn-warning" id="updatesec" onclick="editsection(<?php echo $row['sectionid']; ?>)"><i class="fas fa-pencil-square-o"></i>EDIT</button></td>
                                                    <td><a href="<?php echo "process2.php?deletesection=1&id=".$row['sectionid'] ?>"><button class="btn btn-sm btn-danger" id="delsec"><i class="fas fa-trash"></i>DELETE</button></a></td>
                                                </tr>         
                                                <?php }
                                            }?>                         
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               </div>
                             <!--  END List of Sections -->

                              <!-- Start List of Departments-->
                              <div class="col-md-6"> 
                                <div class="top-campaign">
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <tr>
                                                    <th>Department Name</th>
                                                    <th># of population</th>
                                                    <th>Actions</th>
                                                </tr>
                                                
                                            <?php
                                           

                                           $sql="SELECT departmenttbl.deptid,departmenttbl.departmentname,count(teacherstbl.teachersid) as 'number of students' from teacherstbl join departmenttbl on teacherstbl.deptid=departmenttbl.deptid group by departmenttbl.departmentname ";
                                            $result=mysqli_query($con, $sql);

                                            if(mysqli_num_rows($result)){
                                            while($row = mysqli_fetch_array($result))
                                            {?>
                                                <tr>
                                              <?php  echo "<td>".$row['departmentname']."</td>"; ?>
                                                <?php  echo "<td>".$row['number of students']."</td>"; ?>
                                                    <td><button class="btn  btn-sm btn-warning" id="updatedept" type="button" onclick="editdept(<?php echo $row['deptid']; ?>)"><i class="fas fa-pencil-square-o"></i>EDIT</button></td>
                                                    <td><a href="<?php echo "process2.php?deletedept=1&id=".$row['deptid'] ?>"><button class="btn  btn-sm btn-danger" id="deldept"><i class="fas fa-trash"></i>DELETE</button></td>
                                                </tr>
                                            <?php }
                                            }  
                                             ?>                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               </div>
                             <!--  END List of Departments -->
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
