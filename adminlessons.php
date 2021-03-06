<?php
include('connection.php');
include('adminsession.php');
include('functions.php');

$_SESSION['sidebar']="lessons";

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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        <script>
            function editlesson(ipinasa) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var buongObject = JSON.parse(this.responseText);
                        //document.getElementById("response").innerHTML = buongObject.sname;
                        document.getElementById("selectsubject").label = buongObject.lessonsubjectname;
                        document.getElementById("selectsubject").value = buongObject.lessonsubjectid;
                        document.getElementById("lessontit").value = buongObject.lessontitle;
                        document.getElementById("lessondet").value = buongObject.lessondetail;
                        document.getElementById("file").innerHTML = "Current file: <br/>" + buongObject.lessonpdf;
                        document.getElementById("for-file-input").innerHTML = "<br/> Upload new file";
                        document.getElementById("uId").value = forIpinasa;
                        document.getElementById("addlesson").style.display = "none";
                        document.getElementById("updatelesson").style.display = "inline";
                    }
                };
                var forIpinasa = ipinasa;
                //document.write(forIpinasa);
                var palatandaan = "edit";
                xhttp.open("GET", "processj.php?forIpinasa=" + forIpinasa + "&palatandaan=" + palatandaan, true);
                xhttp.send();
            }
        </script>

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

                                <?php
                                if(@$_SESSION['success_upload_pdf'])
                                    {
                                        //echo "Success";
                                        echo "<div class='alert alert-success' role='alert'> Successfully upload PDF File :) </div>";
                                        unset($_SESSION['success_upload_pdf']);
                                    }
                                    if(@$_SESSION['failed_upload_pdf'])
                                    {
                                        
                                        echo "<div class='alert alert-success' role='alert'> Sorry can't upload PDF File :( </div>";
                                        unset($_SESSION['failed_upload_pdf']);
                                    }

                                    if(@$_SESSION['exist_upload_pdf'])
                                    {
                                        
                                        echo "<div class='alert alert-warning' role='alert'> Already file exists </div>";
                                        unset($_SESSION['exist_upload_pdf']);
                                    }

                                    if(@$_SESSION['only_upload_pdf'])
                                    {
                                        
                                        echo "<div class='alert alert-warning' role='alert'> Only pdf is allowed </div>";
                                        unset($_SESSION['only_upload_pdf']);
                                    }
                            ?>

                                <h2>Lessons</h2>
                                <hr /><br />
                            </div>

                            <?php
                             if(isset($_GET['editlessonresult'])){
                                $editlessonresult=$_GET['editlessonresult'];
                                if($editlessonresult=="success"){
                               // echo "<div class='alert alert-primary' role='alert'> Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." has been updated :) </div>";
                               echo "<div class='alert alert-primary' role='alert'> Lesson has been updated :) </div>";
                                }
                                if($editlessonresult=="failed"){
                                //echo "<div class='alert alert-danger' role='alert'>  Profile: ".$_GET['lname'] .", " .$_GET['fname'] ." cannot be updated :( </div>";
                                echo "<div class='alert alert-primary' role='alert'> Lesson cannot be updated :( </div>";
                                } 
                            }
                            ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <form action="addlesson.php" method="POST"
                                                    enctype="multipart/form-data">
                                                    <select name="subjectid" required>
                                                        <option id="selectsubject" value="" selected readonly>Select Subject
                                                        </option>
                                                        <?php 
                                            $sql="SELECT * from subjecttbl";
                                            $result=mysqli_query($con, $sql);
                                            if(mysqli_num_rows($result)){
                                                while($row = mysqli_fetch_array($result))
                                                { 
                                            ?>
                                                        <option value="<?php echo $row['subjectid'] ?>">
                                                            <?php echo $row['subjectname'] ?></option>
                                                        <?php }
                                         }?>
                                                    </select>

                                                    <strong class="card-title"> <input type="text" name="lessontitle"
                                                            id="lessontit" placeholder="Enter Lesson Title"
                                                            autofocus="autofocus" style="width: 50%" ;>
                                                    </strong>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <input type="hidden" name="uId" id="uId">
                                            <div class="row form-group">
                                                <textarea name="lessondetail" id="lessondet" rows="9"
                                                    placeholder="Enter Lesson Description..."
                                                    class="form-control"></textarea>
                                            </div>

                                            <div id="file"></div>

                                            <div class="row form-group">
                                                <label id="for-file-input" for="file-input"
                                                    class=" form-control-label">Upload File</label><br>
                                                <input type="file" id="file-input" name="lessonpdf"
                                                    class="form-control-file" accept="application/pdf">
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-primary" style="float:right;" type="submit"
                                                name="addlesson" id="addlesson"><i class="fas fa-plus"></i>ADD</button>
                                            <button type="submit" class="btn btn-primary"
                                                style="float:right; display:none; " name="editnewlesson"
                                                id="updatelesson"><i class="fas fa-save"></i> SAVE</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <?php
                                     

                                 $sql="SELECT subjecttbl.subjectname,lessontbl.lessonid,lessontbl.lessontitle,lessontbl.lessondetail,lessontbl.lessonpdf from lessontbl join subjecttbl on lessontbl.subjectid=subjecttbl.subjectid ";
                                $result=mysqli_query($con, $sql);
         
                                 if(mysqli_num_rows($result)){
                                 while($row = mysqli_fetch_array($result))
                                 { 
                                     
                                     $id = $row['lessonid'];
                                     
                                     ?>

                                <div class="col-md-4">

                                    <div class="card">
                                        <div class="card-header">

                                            <h4 class="card-title"><a href="<?php  echo $row['lessonpdf']; ?>">
                                                    <?php  echo "<td>".$row['subjectname']."</td>"; ?></a></h4>
                                            <p> <?php  echo "<td>".$row['lessontitle']."</td>"; ?></p>
                                            <p class="card-text">
                                                <a style="color:maroon; font-size: 12px;"
                                                    href="<?php  echo $row['lessonpdf']; ?>"><i
                                                        class="fas fa-file-pdf-o"></i> Open </a>
                                                &nbsp | &nbsp
                                                <a style="color:maroon; font-size: 12px;"
                                                    href="<?php  echo $row['lessonpdf']; ?>" target="_blank"
                                                    type="application/octet-stream"
                                                    download="<?php echo $row['lessontitle']; ?>"><i
                                                        class="fas fa-download"></i>Download </a>
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"> <?php  echo "<td>".$row['lessondetail']."</td>"; ?>
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <button class="btn btn-warning"
                                                    onclick="editlesson(<?php echo $row['lessonid']; ?>)"><i
                                                        class="fas fa-pencil-square-o"></i>EDIT</button>
                                                &nbsp &nbsp
                                                <a
                                                    href="<?php echo "addlesson.php?deletelesson=1&id=".$row['lessonid'] ?>"><button
                                                        class="btn btn-danger"><i
                                                            class="fas fa-trash"></i>DELETE</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php }
                            }?>

                            </div> <!-- row -->
                        </div> <!-- section__content -->
                    </div><!-- container Fluid -->
                </div><!-- main content -->
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