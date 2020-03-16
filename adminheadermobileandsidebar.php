<!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <!-- <a class="logo row" href="#">
                            <img src="images/icon/logo.png" alt="BSU" style="height: 50px; width:50px;"> 
                            <span><h1> &nbsp &nbsp Bulacan State University</h1></span>
                        </a> -->
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li >
                            <a class="js-arrow" href="adminindex.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="adminsubjects.php">
                                <i class="fas fa-book"></i>Subjects</a>
                        </li>
                        <li>
                            <a href="adminsections.php">
                                <i class="fas  fa-bookmark"></i>Sections/Departments</a>
                        </li>
                        <li>
                            <a href="adminstudents.php">
                                <i class="fas fa-group"></i>Students</a>
                        </li>
                        <li>
                            <a href="adminteachers.php">
                                <i class="fas fa-group"></i>Teachers</a>
                        </li>
                        <li>
                            <a href="adminlessons.php">
                                <i class="fas fa-link"></i>Lessons</a>
                        </li>
                        <li>
                            <a href="adminquizzes.php">
                                <i class="fas fa-file-text"></i>Quizzes</a>
                        </li>
                        <li>
                            <a href="adminscores.php">
                                <i class="far fa-check-square"></i>Scores</a>
                        </li>
                        <li>
                            <a href="adminsettings.php">
                                <i class="fas fa-gear"></i>Settings</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                  <!-- <img src="images/icon/logo.png" alt="BSU" style="height: 75px; width:75px;"> -->
                  <b style="font-size: 30px; color: maroon;">ELMS</b>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li <?php if($_SESSION['sidebar']=="dashboard"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a class="js-arrow" href="adminindex.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard <span class="badge badge-success float-right mt-1">
                                        <strong class="card-title mb-3"></strong> <?php  $sql="SELECT count(antitle) as announcebilang FROM announcementtbl WHERE anfrom='Admin Admin'";
                                         $executeQuery=mysqli_query($con, $sql);
    $result=mysqli_fetch_array($executeQuery);
    echo $ibalik=$result['announcebilang']; ?></span></a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="subjects"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminsubjects.php">
                                <i class="fas fa-book"></i>Subjects <span class="badge badge-success float-right mt-1"><?php $sql="SELECT count(subjectid) as bilang from subjecttbl";
                                 $executeQuery=mysqli_query($con, $sql);
                                 $result=mysqli_fetch_array($executeQuery);
                                 echo $ibalik=$result['bilang']; ?></span></a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="sections"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminsections.php">
                                <i class="fas  fa-bookmark"></i>Sections/Departments</a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="students"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminstudents.php">
                                <i class="fas fa-group"></i>Students</a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="teachers"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminteachers.php">
                                <i class="fas fa-group"></i>Teachers</a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="lessons"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminlessons.php">
                                <i class="fas fa-link"></i>Lessons <span class="badge badge-success float-right mt-1"><?php $sql="SELECT count(lessonid) as bilang from lessontbl";
                                 $executeQuery=mysqli_query($con, $sql);
                                 $result=mysqli_fetch_array($executeQuery);
                                 echo $ibalik=$result['bilang']; ?></span></a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="quizzes"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminquizzes.php">
                                <i class="fas fa-file-text"></i>Quizzes <span class="badge badge-success float-right mt-1"><?php $sql="SELECT count(quizid) as bilang from quiztbl";
                                 $executeQuery=mysqli_query($con, $sql);
                                 $result=mysqli_fetch_array($executeQuery);
                                 echo $ibalik=$result['bilang']; ?></span></a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="scores"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminscores.php">
                                <i class="far fa-check-square"></i>Scores <span class="badge badge-success float-right mt-1"><?php $sql="SELECT count(scoreid) as bilang from scoretbl";
                                 $executeQuery=mysqli_query($con, $sql);
                                 $result=mysqli_fetch_array($executeQuery);
                                 echo $ibalik=$result['bilang']; ?></span></a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="settings"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="adminsettings.php">
                                <i class="fas fa-gear"></i>Settings</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
