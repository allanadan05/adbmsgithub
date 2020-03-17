<?php
include('connection.php');
include('teachersession.php');



?>


<!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="header-wrap float-left">
                    <a class="logo row" href="#">
                            <img src="images/icon/logo-mini_bsu.png" alt="BSU" style="height: 50px; width:50px;"> 
                            <b style="font-size: 30px; color: maroon;">&nbsp &nbsp Bulacan State University</b>
                            <!-- <span><h1><a>&nbsp &nbsp Bulacan State University</a></h1></span> -->
                    </a>
                    
                    </div>
                        <div class="header-wrap float-right">
                           
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-dan.jpg" alt="profile" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['lname'].", ".$_SESSION['fname'];//echo $lname." , ".$fname;?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-dan.jpg" alt="avatar" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['lname'].", ".$_SESSION['fname'];//echo $lname.",".$fname?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['email'];//echo $logacc; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">    
                                                <div class="account-dropdown__item">
                                                    <a href="teachersettings.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->