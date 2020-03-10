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
                        <li class="active has-sub">
                            <a class="js-arrow" href="teacherindex.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="teachersubjects.php">
                                <i class="fas fa-book"></i>Subjects</a>
                        </li>
                        <li>
                            <a href="teachersections.php">
                                <i class="fas  fa-bookmark"></i>Sections/Departments</a>
                        </li>
                        <li>
                            <a href=teacherstudents.php">
                                <i class="fas fa-group"></i>Students</a>
                        </li>
                        <li>
                            <a href="teacherteachers.php">
                                <i class="fas fa-group"></i>Teachers</a>
                        </li>
                        <li>
                            <a href="teacherlessons.php">
                                <i class="fas fa-link"></i>Lessons</a>
                        </li>
                        <li>
                            <a href="teacherquizzes.php">
                                <i class="fas fa-file-text"></i>Quizzes</a>
                        </li>
                        <li>
                            <a href="teacherscores.php">
                                <i class="far fa-check-square"></i>Scores</a>
                        </li>
                        <li>
                            <a href=teachersettings.php">
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
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub"<?php if($_SESSION['sidebar']=="dashboard"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                        
                            <a class="js-arrow" href="teacherindex.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li <?php if($_SESSION['sidebar']=="subjects"){
echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teachersubjects.php">
                                <i class="fas fa-book"></i>Subjects</a>
                        </li>
                        <li  <?php if($_SESSION['sidebar']=="section"){
echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teachersections.php">
                                <i class="fas  fa-bookmark"></i>Sections/Departments</a>
                        </li>
                        <li  <?php if($_SESSION['sidebar']=="students"){
echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teacherstudents.php">
                                <i class="fas fa-group"></i>Students</a>
                        </li>
                        <li  <?php if($_SESSION['sidebar']=="teachers"){
echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teacherteachers.php">
                                <i class="fas fa-group"></i>Teachers</a>
                        </li>
                        <li  <?php if($_SESSION['sidebar']=="lessons"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teacherlessons.php">
                                <i class="fas fa-link"></i>Lessons</a>
                        </li>
                        <li  <?php if($_SESSION['sidebar']=="quizzes"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teacherquizzes.php">
                                <i class="fas fa-file-text"></i>Quizzes</a>
                        </li>
                        <li  <?php if($_SESSION['sidebar']=="scores"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teacherscores.php">
                                <i class="far fa-check-square"></i>Scores</a>
                        </li>
                        <li  <?php if($_SESSION['sidebar']=="settings"){
 echo "style='background:#abbaab;background:-webkit-linear-gradient(to right, #ffffff, #abbaab);background:linear-gradient(to right, #ffffff, #abbaab);max-width: 200%;border-radius: 20px 20px 20px 20px;box-sizing: border-box;'";
} ?>>
                            <a href="teachersettings.php">
                                <i class="fas fa-gear"></i>Settings</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
