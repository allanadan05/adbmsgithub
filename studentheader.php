<?php
include('connection.php');
include('session.php');

?>
<!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <!--img src="images/icon/avatar-dan.jpg" alt="profile" /-->
                                            <!-- New line code image-->
                                            <?php

                                $query="SELECT `image` FROM `userstbl` WHERE email='".$_SESSION['email']."' ";
                                $result=mysqli_query($con,$query);

                                    if($row=mysqli_fetch_array($result) )
                                    {
                                //print_r($row['img']);
                                ?>
                                <!-- if empty profile picture use default background-->
                                <img style=" margin: 10px 0 0 0;width: 30px; height: 30px; border-radius: 100px;" onerror="this.src='images/defaultpic/defaultPIC.png'" src="<?php echo "images/profile_picture/".$row['image']."";?>">

                                <?php

                                }
                                ?>
                                <!-- if empty profile picture use default background-->
                                <!-- New line code image-->
                                        </div>
                                
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['lname'].", ".$_SESSION['fname'];//echo $lname.",".$fname; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <!--img src="images/icon/avatar-dan.jpg" alt="avatar" /-->
                                            <!-- New line code image-->
                                            <?php

                                $query="SELECT `image` FROM `userstbl` WHERE email='".$_SESSION['email']."' ";
                                $result=mysqli_query($con,$query);

                                    if($row=mysqli_fetch_array($result) )
                                    {
                                //print_r($row['img']);
                                ?>
                                <!-- if empty profile picture use default background-->
                                <img style=" margin: 10px 0 0 0;width: 57px; height: 54px; border-radius: 100px;" onerror="this.src='images/defaultpic/defaultPIC.png'" src="<?php echo "images/profile_picture/".$row['image']."";?>">

                                <?php

                                }
                                ?>
                                <!-- if empty profile picture use default background-->
                                <!-- New line code image-->
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['lname'].", ".$_SESSION['fname'];//echo $lname.",".$fname; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $logacc; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">    
                                                <div class="account-dropdown__item">
                                                    <a href="studentindex.php#accountinfo">
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