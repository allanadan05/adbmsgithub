<?php 

include('connection.php');
include('adminsession.php');
include('functions.php');

$count=0;
$rr="";

if($_SESSION['access']=="user"){

}else{
    header("Location: index.php?login=access");
    exit();
}

$profileid=$_SESSION['userid'];
$quizid=$_GET['quizid'];

//echo "profileid: ".$profileid.", quizid: ".$quizid.", totalscore: ".$totalscore.", averagescore: ".$averagescore;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script>

        function submitanswer(count, questid) {
            var useranswer = "";
            if (document.getElementById("radio1" + count).checked) {
                useranswer = "A";
            } else if (document.getElementById("radio2" + count).checked) {
                useranswer = "B";
            } else if (document.getElementById("radio3" + count).checked) {
                useranswer = "C";
            } else if (document.getElementById("radio4" + count).checked) {
                useranswer = "D";
            } else {
                useranswer = "undefined";
            }
            var score = document.getElementById("score").innerHTML;
            var avgscore = document.getElementById("avgscore").innerHTML;
            var noofitems = document.getElementById("noOfQuestion").innerHTML;
            document.getElementById("noOfItems").innerHTML = noofitems;
            var ans = document.getElementById("answer" + count).value;
            var ans2 = ans;
            if (useranswer == ans) {
                document.getElementById("message" + count).value = "Correct";
                document.getElementById("score").innerHTML = (Number(score) + 1);
                score = document.getElementById("score").innerHTML;
                noofitems = document.getElementById("noOfQuestion").innerHTML;
                document.getElementById("avgscore").innerHTML = (((Number(score) / Number(noofitems)) * 50) + 50) + "%";
                document.getElementById("submit" + count).style.display = "none";
                document.getElementById("finish").style.display = "inline";
                //document.getElementById("<?php $ts ?>").innerHTML=(Number(score)+1);
                //document.getElementById("<?php $as ?>").innerHTML=(((Number(score)/Number(noofitems))*50)+50)+"%";
            } else if (useranswer == "undefined") {
                document.getElementById("message" + count).value = "Please select an answer";
                document.getElementById("submit" + count).style.display = "inline";
                document.getElementById("finish").style.display = "none";
                document.getElementById("answer" + count).value = ans2;
            } else {
                document.getElementById("message" + count).value = "Wrong!"; // + ", Correct answer is: " + ans;
                document.getElementById("submit" + count).style.display = "none";
                document.getElementById("finish").style.display = "inline";
            }
        }

        function qresult(id) {
            document.getElementById("quizresults").style.display = "inline";
            document.getElementById("exitbtn").style.display = "inline";
            document.getElementById("savequizbtn").style.display = "none";
            document.getElementById("quests").style.display = "none";
            document.getElementById("finish").style.display = "none";
            document.getElementById("startbtn").style.display = "none";
            document.getElementById("modalbtn2").click();
            document.getElementById("remtime").innerHTML="Remaining Time: 0 minute";
            document.getElementById("quests").style.display = "none";
            savequizforbackup();
            
        }

        function savequiznow() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("resultsaved").innerHTML = this.responseText;
                    document.getElementById("resultsfinished").innerHTML = this.responseText;
                    document.getElementById("savequizbtn").style.display = "none";
                }
            };
            
            var score = document.getElementById("score").innerHTML;
            var avgscore = document.getElementById("avgscore").innerHTML;
            var userid = document.getElementById("userprofile").value;
            var quizid = document.getElementById("quizquizid").value;
            var noofitems = document.getElementById("noOfQuestion").innerHTML;
            var palatandaan = "savequiznow";
            xhttp.open("GET", "process2.php?score=" + score + "&avgscore=" + avgscore + "&userid=" + userid +  "&quizid=" + quizid + "&noofitems=" + noofitems + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        function savequizforbackup() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("resultsaved").innerHTML = this.responseText;
                    document.getElementById("resultsfinished").innerHTML = this.responseText;
                    document.getElementById("savequizbtn").style.display = "none";
                }
            };
            
            var score = document.getElementById("score").innerHTML;
            var avgscore = document.getElementById("avgscore").innerHTML;
            var userid = document.getElementById("userprofile").value;
            var quizid = document.getElementById("quizquizid").value;
            var noofitems = document.getElementById("noOfQuestion").innerHTML;
            var palatandaan = "savequizforbackup";
            xhttp.open("GET", "process2.php?score=" + score + "&avgscore=" + avgscore + "&userid=" + userid +  "&quizid=" + quizid + "&noofitems=" + noofitems + "&palatandaan=" + palatandaan, true);
            xhttp.send();
        }

        var bol=0;
        function startquiz(){
            if (bol==0){
                savequiznow();
                bol=bol+1;
            }

            document.getElementById("reminder").style.display="none";
            document.getElementById("reminder").innerHTML=document.getElementById("msg").innerHTML;
            document.getElementById("msg").style.display="none";
            if(document.getElementById("reminder").innerHTML=="1"){
                document.getElementById("test").innerHTML="<div class='alert alert-success' role='alert'>Quiz has been initiated</div>";
            }else{
                document.getElementById("test").innerHTML="<div class='alert alert-success' role='alert'>Quiz has been saved</div>";
                location.href="scores.php";
            }
            
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
<!-- onbeforeunload="return 'Are you sure you want to leave the page?' "  -->
    <div class="page-wrapper">
        <?php include("studentheaderandmobileview.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php include("studentheader.php"); ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
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

                            <h2><?php echo "Quiz: " .$rr['quizname'];  ?></h2>
                            <hr />
                            <p><?php echo "Subject: " .$rr['subjectname'];   ?></p>
                            <p  id="remtime">
                                <label>Remaining Time : </label>
                                <span id="timer">
                                    <?php echo $rr['duration'] .":00";  ?>
                                </span>
                                minutes
                            </p>

                        </div>

                    </div>
                    <button id="startbtn" type="button" class="btn  btn-primary" onclick="startTimer()">START</button> 
                    <br/>
                    <p style="font-size: 15px;" id="reminder">  * Once you clicked Start Button, you can no longer retake the quiz. <br/> Refreshing and Closing the page will submit 0 score. </p>
                    <div id="test"></div>

                    <!-- Button trigger modal for 5 mins warning -->
                    <button id="modalbtn" type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal" hidden>
                        Launch Modal
                    </button>

                    <!-- Button trigger modal for quiz results -->
                    <button id="modalbtn2" type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal2" hidden>
                        Results
                    </button>
                    
                    <div id="resultsfinished"></div>

                    <div class="row" id="quests" style="display: none;">
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
                                    <strong class="card-title" id="questionNo">Question
                                        #<?php echo ++$count ." of " ?></strong>
                                    <strong class="card-title"
                                        id="noOfQuestion"><?php echo $row['noOfQuestion']; ?></strong>
                                    <button class="btn btn-primary" type="button" id="<?php echo 'submit'.$count; ?>"
                                        onclick="submitanswer(<?php echo $count .","  .$questid; ?>)"
                                        style="float:right; display:inline">Submit</button>
                                    <input type="hidden" id="<?php echo 'answer'.$count; ?>" value="<?php echo $ans; ?>"
                                        style="float:right; width:15px; text-align: center;" readonly>
                                    <input type="text" id="<?php echo 'message'.$count; ?>"
                                        style="float:right; width:50%; text-align: center;" readonly>

                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['question']; ?>
                                    </p>
                                    <br />
                                    <div class="row form-group">
                                        <div class="col col-md-2">

                                        </div>

                                        <div class="col col-md-8">
                                            <form>
                                            <div class="form-check" id="<?php echo 'radio'.$count; ?>">
                                                <div class="radio">
                                                    <label for="<?php echo 'radio1'.$count; ?>" class="form-check-label ">
                                                        <input type="radio" id="<?php echo 'radio1'.$count; ?>"
                                                            name="radios" value="A"
                                                            class="form-check-input"><?php echo "<strong> A. </strong> " .$pilian['optiona']; ?>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="<?php echo 'radio2'.$count; ?>" class="form-check-label ">
                                                        <input type="radio" id="<?php echo 'radio2'.$count; ?>"
                                                            name="radios" value="B"
                                                            class="form-check-input"><?php echo "<strong> B. </strong> " .$pilian['optionb']; ?>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="<?php echo 'radio3'.$count; ?>" class="form-check-label ">
                                                        <input type="radio" id="<?php echo 'radio3'.$count; ?>"
                                                            name="radios" value="C"
                                                            class="form-check-input"><?php echo "<strong> C. </strong> " .$pilian['optionc']; ?>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="<?php echo 'radio4'.$count; ?>" class="form-check-label ">
                                                        <input type="radio" id="<?php echo 'radio4'.$count; ?>"
                                                            name="radios" value="D"
                                                            class="form-check-input"><?php echo "<strong> D. </strong> " .$pilian['optiond']; ?>
                                                    </label>
                                                </div>
                                            </div>
                                            </form>
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
                             ?>
                        </div>

                    </div> <!-- row -->

                    <button id="finish" class="btn btn-success" type="button" onclick="qresult(<?php echo $id;?>)"
                        style="width: 100%; display:none;">Finish</button>
                    <button class="btn btn-success" type="button" id="savequizbtn" onclick="savequiznow()"
                        style="width: 100px; display:none">Save Quiz</button>
                    <a href="scores.php" id="exitbtn" style="width: 100%; display:none"><button class="btn btn-warning"
                            type="button" onclick="savequiznow()">Exit</button></a>
                    <?php }//end isset quizid ?>

                </div> <!-- section__content -->
            </div><!-- container Fluid -->
        </div><!-- main content -->
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>

    <!-- Modal for remaining time -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalWarning">Warning!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="exampleModalBody">
                    5 minutes remaining!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submitmodal()">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for finish -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Time's Up!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="finishresults">
                    <input type="hidden" id="userprofile" value="<?php echo $profileid; ?>">
                    <input type="hidden" id="quizquizid" value="<?php echo $id; ?>">

                    <div id="quizresults" style="display: none;">
                        <b>Results</b>
                        <hr>
                        <p>Score: <span id="score">0</span>/<span id="noOfItems">0</span></p>
                        <p>Average: <span id="avgscore">0</span></p>
                        <br>
                    </div>
                    <div id="resultsaved"></div>
                </div>
                <div id="resultsavedmodal"></div>
                <div class="modal-footer">

                    <button class="btn btn-success" type="button" id="savequizbtn" onclick="savequiznow()"
                        style="width: 100px; display:none">Save Quiz</button>
                    <a href="scores.php" id="exitbtn" style="width: 100%; display:inline"><button
                            class="btn btn-warning" type="button" onclick="savequiznow()">Exit</button></a>

                    <!-- <button type="button" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->

                </div>
            </div>
        </div>
    </div>

    <script>

        document.onkeydown=function(event){
            if(event.keyCode==116){
                event.preventDefault();
                //disable f5 key
            }
        }

        function startTimer() {      

                

                if(document.getElementById("remtime").innerHTML=="Remaining Time: 0 minute"){
                    document.getElementById("quests").style.display = "none";
                    // document.getElementById("resultsfinished").innerHTML="<br/>" + document.getElementById("finishresults").innerHTML;

                }else{
                    
                    document.getElementById("quests").style.display = "inline";
                    
                    document.getElementById("startbtn").style.display = "none";
                    var presentTime = document.getElementById("timer").innerHTML;
                    var timeArray = presentTime.split(/[:]+/);
                    var m = timeArray[0];
                    var s = checkSecond((timeArray[1] - 1));
                    if (s == 59) {
                        m = m - 1
                    }
                    
                    document.getElementById("timer").innerHTML = m + ":" + s;
                    console.log(m)
                    if (m == 5 && s == 0) {
                        // alert("WARNING:\n5 minutes remaining!");
                        document.getElementById("modalbtn").click();
                    }

                    if (m == 0 && s == 10) {
                        // alert("WARNING:\n10 seconds remaining!");
                        document.getElementById("exampleModalWarning").innerHTML="Hurry Up!"
                        document.getElementById("exampleModalBody").innerHTML="10 seconds remaining!"
                        document.getElementById("modalbtn").click();
                    }

                    if (m <= 0 && s <= 0) {
                        document.getElementById("remtime").innerHTML="Remaining Time: 0 minute";
                        document.getElementById("finish").click();
                        
                    }
                    setTimeout(startTimer, 1000);
                    
                }
                startquiz();   
        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {
                sec = "0" + sec
            }; // add zero in front of numbers < 10
            if (sec < 0) {
                sec = "59"
            };
            return sec;
        }

        function submitmodal(){
            document.getElementById("finish").click();
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

</html>
<!-- end document-->