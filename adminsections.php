<?php
include('connection.php');
include('adminsession.php');
include('functions.php');



?>
<!DOCTYPE html>
<php lang="en">

<head>
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
       
    }
    #update{
        background-color: #fcf003;
        width: 60px;
        height: 30px;
        font-size: 12px;
        border-radius: 5px;
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
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                   <form action="addsection.php" method="POST">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href=""> ADD SECTION </a>
                                        </strong>
                                     </div>
                                    <div class="card-body">
                                        <strong class="card-title"><input type="text" name="sectionname" placeholder="Enter Section name" >
                                        </strong>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" style="float:right;" type="submit"><i class="fas fa-plus"></i>ADD</button>
                                    </div>
                                </div> 
                            </form>
                            </div>

                            <div class="col-md-4">
                                    <form action="adddept.php" method="POST">
                                    <div class="card">
                                     <div class="card-header">
                                         <strong class="card-title"><a href="#"> ADD DEPARTMENT </a>
                                        </strong>
                                     </div>
                                    <div class="card-body">
                                        <strong class="card-title"> <input type="text" name="departmentname" placeholder="Enter deaprtment name" autofocus="autofocus"> </a>
                                        </strong>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" style="float:right;" type="submit"><i class="fas fa-plus"></i>ADD</button>
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
                                                

                                                $sql="SELECT sectiontbl.sectionname,count(userstbl.userid) as 'number of students' from userstbl join sectiontbl on userstbl.sectionid=sectiontbl.sectionid group by sectiontbl.sectionname ";
                                                $result=mysqli_query($con, $sql);

                                                if(mysqli_num_rows($result)){
                                                while($row = mysqli_fetch_array($result))
                                                {?>
                                                   
                                                <tr>
                                              <?php  echo "<td>".$row['sectionname']."</td>"; ?>
                                              <?php  echo "<td>".$row['number of students']."</td>"; ?>
                                                    <td><button id="update"><i class="fas fa-pencil-square-o"></i>EDIT</button></td>
                                                    <td><button id="del"><i class="fas fa-trash"></i>DELETE</button></td>
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
                                           

                                           $sql="SELECT departmenttbl.departmentname,count(teacherstbl.teachersid) as 'number of students' from teacherstbl join departmenttbl on teacherstbl.deptid=departmenttbl.deptid group by departmenttbl.departmentname ";
                                            $result=mysqli_query($con, $sql);

                                            if(mysqli_num_rows($result)){
                                            while($row = mysqli_fetch_array($result))
                                            {?>
                                                <tr>
                                              <?php  echo "<td>".$row['departmentname']."</td>"; ?>
                                                <?php  echo "<td>".$row['number of students']."</td>"; ?>
                                                    <td><button id="update"><i class="fas fa-pencil-square-o"></i>EDIT</button></td>
                                                    <td><button id="del"><i class="fas fa-trash"></i>DELETE</button></td>
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
