<?php
include('session.php');
$secid = $_SESSION['sectionid'];
$id = $_SESSION['id'];

if($_SESSION['access']=="user"){

}else{
    header("Location: index.php?login=access");
    exit();
}

?>
<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.php">
                    <img src="images/icon/logo.png" alt="BrightMind" />
                </a>
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
                <li class="has-sub">
                    <a class="js-arrow" href="studentindex.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="studentsubjects.php">
                        <i class="fas fa-book"></i>Subjects</a>
                </li>
                <li>
                    <a href="studentquizzes.php">
                        <i class="far fa-file-text"></i>Quizzes</a>
                </li>
                <li>
                    <a href="studentscores.php">
                        <i class="fas fa-star"></i>Scores</a>
                </li>
                <li>
                    <a href="settings.php">
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
                <li <?php if ($_SESSION['sidebar'] == "dashboards") {
                        echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
                    } ?>>
                    <a class="js-arrow" href="studentindex.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard <span class="badge badge-success float-right mt-1">
                            <strong class="card-title mb-3"></strong> <?php $sql = "SELECT count(antitle) as announcebilang FROM announcementtbl WHERE sectionid='$secid'";
                                                                        $executeQuery = mysqli_query($con, $sql);
                                                                        $result = mysqli_fetch_array($executeQuery);
                                                                        echo $ibalik = $result['announcebilang']; ?></span> </a>
                </li>
                <li <?php if ($_SESSION['sidebar'] == "subjects") {
                        echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
                    } ?>>
                    <a href="subjects.php">
                        <i class="fas fa-book"></i>Subjects <?php $sql = "SELECT count(subjectid) as announcebilang FROM sectionsubjecttbl where sectionid=".$secid;
                                                                        $executeQuery = mysqli_query($con, $sql);
                                                                        $result = mysqli_fetch_array($executeQuery);
                                                                         $ibalik = $result['announcebilang']; 
                                                                         if($ibalik>0){
                                                                            echo $ibalik = $result['announcebilang'];
                                                                            echo "<span class='badge badge-success float-right mt-1' >
                                                                            <strong class='card-title mb-3'></strong>".$ibalik = $result['announcebilang']."</span>";
                                                                            
                                                                         }?></a>
                </li>
                <li <?php if ($_SESSION['sidebar'] == "quizzes") {
                        echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
                    } ?>>
                    <a href="quizzes.php">
                        <i class="fas fa-file-text"></i>Quizzes<?php $sql = "SELECT count(quizid) as announcebilang FROM quiztbl where status='ACTIVATED'";
                                                                        $executeQuery = mysqli_query($con, $sql);
                                                                        $result = mysqli_fetch_array($executeQuery);
                                                                         $ibalik = $result['announcebilang']; 
                                                                         if($ibalik>0){
                                                                            echo $ibalik = $result['announcebilang'];
                                                                            echo "<span class='badge badge-success float-right mt-1' >
                                                                            <strong class='card-title mb-3'></strong>".$ibalik = $result['announcebilang']."</span>";
                                                                            
                                                                         }?></a>
                </li>
                <li <?php if ($_SESSION['sidebar'] == "scores") {
                        echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
                    } ?>>
                    <a href="scores.php">
                        <i class="far fa-check-square"></i>Scores <span class="badge badge-success float-right mt-1">
                            <strong class="card-title mb-3"></strong> <?php $sql = "SELECT count(scoreid) as announcebilang FROM scoretbl where userid='$id'";
                                                                        $executeQuery = mysqli_query($con, $sql);
                                                                        $result = mysqli_fetch_array($executeQuery);
                                                                        echo $ibalik = $result['announcebilang']; ?></span></a>
                </li>
                <li <?php if ($_SESSION['sidebar'] == "settings") {
                        echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
                    } ?>>
                    <a href="settings.php">
                        <i class="fas fa-gear"></i>Settings</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->