<?php 

include('connection.php');
include('adminsession.php');
include('functions.php');

$count=0;
$rr="";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script>
        
        function submitanswer(count, questid){
            

            var useranswer="";
            if(document.getElementById("radio1"+count).checked){
                useranswer="A";
            }else if (document.getElementById("radio2"+count).checked) {
                useranswer="B";
            }else if (document.getElementById("radio3"+count).checked) {
                useranswer="C";
            }else if (document.getElementById("radio4"+count).checked) {
                useranswer="D";
            }else{
                useranswer="undefined";
            }

            var score=document.getElementById("score").innerHTML;
            var noofitems=document.getElementById("noOfQuestion").innerHTML;
            document.getElementById("noOfItems").innerHTML="# of Items: "+noofitems;


            var ans=document.getElementById("answer"+count).value;
            var ans2=ans;
            if(useranswer==ans){
                document.getElementById("message"+count).value="Correct";
                document.getElementById("score").innerHTML=(Number(score)+1);
                document.getElementById("submit"+count).style.display="none";
            }else if (useranswer=="undefined") {
                document.getElementById("message"+count).value="Please select an answer";
                document.getElementById("submit"+count).style.display="inline";
                document.getElementById("answer"+count).value=ans2;
            }else{
                document.getElementById("message"+count).value="Wrong! " +", Correct answer is: "+ans;
                document.getElementById("submit"+count).style.display="none";
            }
            

        }

        function qresult() {
            document.getElementById("quizresults").style.display="inline";
            document.getElementById("quests").style.display="none";
            document.getElementById("finish").style.display="none";
            document.getElementById("exitbtn").style.display="inline";
        }


    </script>
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
            <div class="main-content" >
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <div>
                                <?php

                                    if(isset($_GET['quizid'])){
                                    $id=$_GET['quizid'];
                                    $qq = "select quizid, quizname, (SELECT subjectname FROM subjecttbl WHERE subjectid=quiztbl.subjectid) AS subjectname, duration, status FROM quiztbl WHERE quizid='$id' ";
                                    $ee = mysqli_query($con, $qq);
                                    while($rr = mysqli_fetch_array($ee)){
                                
                                ?>
                               
                                <h2><?php echo "Quiz: " .$rr['quizname'];  ?></h2><hr/>
                                <p><?php echo "Subject: " .$rr['subjectname'];   ?></p>
                                <p><?php echo "Duration: " .$rr['duration'];  ?></p>
                                <div id="quizresults" style="display: none;">
                                <hr><p>Score: <span id="score"></span> </p>
                                    <p id="noOfItems"># of Items: </p>
                                    <br>
                                </div>
                                
                            </div>
                        <div class="row" id="quests" style="display: inline;">
                            <div class="col-md-12">

                                <?php

                                if($rr['status']=="ACTIVATED"){
                                    $que="select questionid, question, (select count(question) FROM questiontbl WHERE quizid='$id') AS noOfQuestion from questiontbl where quizid='$id' "; /* LIMIT ".$count .", 1 ";*/
                                    $quer=mysqli_query($con, $que);
                                    while($row=mysqli_fetch_array($quer)){
                                        $questid=$row['questionid'];
                                ?>

                                <div class="card border border-primary"> 
                                    <div class="card-header">
                                         <?php 

                                                $sqlsql="select questionid, optionid, answer from answertbl where questionid='$questid' ";
                                                $query2=mysqli_query($con, $sqlsql);
                                                $opo=mysqli_fetch_array($query2);
                                                $optionsid=$opo['optionid'];
                                                $ans=$opo['answer'];

                                                $sql3="select * from optionstbl where optionsid='$optionsid' ";
                                                $query3=mysqli_query($con, $sql3);
                                                $pilian=mysqli_fetch_array($query3);

                                        ?>
                                        <strong class="card-title" id="questionNo">Question #<?php echo ++$count ." of " ?></strong>
                                        <strong class="card-title" id="noOfQuestion"><?php echo $row['noOfQuestion']; ?></strong>
                                        <button class="btn btn-primary" type="button" id="<?php echo 'submit'.$count; ?>" onclick="submitanswer(<?php echo $count .","  .$questid; ?>)" style="float:right; display:inline">Submit</button>
                                        <input type="hidden" id="<?php echo 'answer'.$count; ?>" value="<?php echo $ans; ?>" style="float:right; width:15px; text-align: center;"  readonly>
                                        <input type="text" id="<?php echo 'message'.$count; ?>" style="float:right; width:50%; text-align: center;"  readonly>
                                        
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $row['question']; ?>
                                        </p>
                                        <br/>
                                        <div class="row form-group">
                                                <div class="col col-md-2">
                                                    
                                                </div>
                                               
                                                <div class="col col-md-8">
                                                    <div class="form-check" id="<?php echo 'radio'.$count; ?>">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="<?php echo 'radio1'.$count; ?>" name="radios" value="A" class="form-check-input"><?php echo "<strong> A. </strong> " .$pilian['optiona']; ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="<?php echo 'radio2'.$count; ?>" name="radios" value="B" class="form-check-input"><?php echo "<strong> B. </strong> " .$pilian['optionb']; ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio3" class="form-check-label ">
                                                                <input type="radio" id="<?php echo 'radio3'.$count; ?>" name="radios" value="C" class="form-check-input"><?php echo "<strong> C. </strong> " .$pilian['optionc']; ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio4" class="form-check-label ">
                                                                <input type="radio" id="<?php echo 'radio4'.$count; ?>" name="radios" value="D" class="form-check-input"><?php echo "<strong> D. </strong> " .$pilian['optiond']; ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div> <!-- end card border--> 

                            <?php 
                            }//end while row
                            }else{
                                    echo "<div class='alert alert-danger' role='alert'> Quiz has been deactivated </div>";
                                 }

                             }//end while 
                             }//end isset quizid ?> 
                            </div>

                        </div> <!-- row -->

                        <button class="btn btn-success" type="button" id="finish" onclick="qresult()" style="width: 100%; display:inline">Finish</button>
                        <a href="adminquizzes.php" id="exitbtn" style="width: 100%; display:none"><button class="btn btn-warning" type="button">Exit</button></a>

                       

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

</html>
<!-- end document-->
