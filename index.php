<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Jobs Portal</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/vendors.css" rel="stylesheet">
    <link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Modernizr -->
    <script src="js/modernizr.js"></script>
    <script src="js/typeahead.min.js"></script>


    <style>



    </style>




</head>

<body>

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="index.php" title="Jobs Portal">Jobs Portal</a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                <ul id="top_access">

                </ul>
                <div class="main-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>

                        <li><a href="list.php">All Jobs</a></li>
                       
                        <li><a href="user_register.php">Register</a></li>
                        <li><a href="user_login.php">Login</a></li>
                        <li><a href="contacts.php">Contact</a></li>

                    </ul>
                </div>
                <!-- /main-menu -->
            </nav>
        </div>
    </div>
    <!-- /container -->
</header>
<!-- /header -->

<main>
    <div class="header-video">
        <div id="hero_video">
            <div class="content">
                <h3>Find Your Job!</h3>
                <p>
                    Find your Desire Job Easily At Anytime Anywhere
                </p>
                <form method="post" action="list.php">
                    <div>
                        <div class="table-responsive">
                            <table align="center">
                                <tr>
                                    <td>
                                        <select class="form-control name_list" name="division" required>
                                            <option value="Not Selected" selected disabled>Select Division</option>
                                            <?php
                                            include('db_connect.php');
                                            $conn=db();
                                            $result = mysqli_query($conn, "SELECT division_name FROM division");
                                            //sort($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<option value='" . $row['division_name'] . "'>" . $row['division_name'] . "</option>";

                                            }
                                            echo "</select>";

                                            ?>
                                    </td>


                                    <td>
                                        <select class="form-control name_list" name="category" required >
                                            <option value="Not Selected" selected disabled>Select Category</option>
                                            <?php


                                            $result = mysqli_query($conn, "SELECT * FROM job_category");
                                            //sort($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";

                                            }
                                            echo "</select>";

                                            ?>
                                    </td>
                                    <td>

                                        <button type="submit" id="btn_submit" class="btn btn-info btn-fill pull-right">SEARCH</button>
                                        <div class="clearfix"></div>


                                    </td>


                                </tr>
                            </table>
                        </div>
                    </div>


            </div>
            </form>
        </div>
    </div>
    <img src="img/video_fix.png" alt="" class="header-video--media" data-video-src="video/intro22"
         data-teaser-source="video/intro22" data-provider="" data-video-width="1920" data-video-height="750">
    </div>
    <!-- /Header video -->

    <div class="container margin_120_95">
        <div class="main_title">
            <h2>Discover <strong>Right</strong> Jobs!</h2>
            <p>User can easily find jobs and get details information from home!</p>
        </div>
        <div class="row add_bottom_30">
            <div class="col-lg-4">
                <div class="box_feat" id="icon_1">
                    <span></span>
                    <h3>Find a Job</h3>
                    <p>User can easily find job and get appointment information from home!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_2">
                    <span></span>
                    <h3>View Details</h3>
                    <p>View job details and get all necessary information and apply for job </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_3">
                    <h3>Visit for Interview</h3>
                    <p>Apply your suitable jobs and get interview call easily</p>
                </div>
            </div>
        </div>
        <!-- /row -->
        <p class="text-center"><a href="list.php" class="btn_1 medium">Find Jobs</a></p>
    </div>
    <!-- /container -->


    <div class="container margin_120_95">
        <div class="main_title">
            <h2>Find by Category</h2>
            <p>Find your job by clicking desire category</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category=101" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/bank.svg" width="60" height="60" alt="">
                    <h3>Banking</h3>

                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category_id=102" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/ic_education.svg" width="60" height="60" alt="">
                    <h3>Education</h3>

                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category_id=103" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/ic_it.svg" width="60" height="60" alt="">
                    <h3>Information Technology</h3>

                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category_id=104" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/icon_cat_8.svg" width="60" height="60" alt="">
                    <h3>Developer</h3>

                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category_id=105" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/ic_engineer.svg" width="60" height="60" alt="">
                    <h3>Software Engineer</h3>

                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category_id=106" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/icon_cat_5.svg" width="60" height="60" alt="">
                    <h3>Medical</h3>

                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category_id=107" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/ic_designer.svg" width="60" height="60" alt="">
                    <h3>Designer</h3>

                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="list.php?category_id=108" class="box_cat_home">
                    <i class="icon-info-4"></i>
                    <img src="img/icon_cat_8.svg" width="60" height="60" alt="">
                    <h3>Others</h3>

                </a>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->


    <!-- /app_section -->
</main>
<!-- /main content -->

<footer>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <p>
                    <a href="index.php" title="Findoctor">
                        <img src="img/logo.png" data-retina="true" alt="" width="170" height="50" class="img-fluid">
                    </a>
                </p>

                <p>Jobs Portal is an online platforms where you can easily find suitable jobs. You can get jobs details and apply for any job from our website</p>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>About</h5>
                <ul class="links">
                    <li><a href="#">About us</a></li>
                   
                    <li><a href="#">Contact</a></li>

                    <li><a href="user_register.php">Register</a></li>
                    <li><a href="user_login.php">Login</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Useful links</h5>
                <ul class="links">
                    <li><a href="list.php">All Jobs</a></li>
                  
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Contact with Us</h5>
                <ul class="contacts">
                    <li><a href="tel://01621747060"><i class="icon_mobile"></i>+88 01621747060</a></li>

                    <li><a href="mailto:info@jobsportal.com"><i class="icon_mail_alt"></i> info@Jobs Portal.com</a>
                    </li>
                </ul>

            </div>
        </div>
        <!--/row-->
        <hr>
        <div class="row">
            <div class="col-md-8">
                <ul id="additional_links">
                    <li><a href="#">Terms and conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div id="copy">Copyright © 2019 Jobs Portal</div>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->

<div id="toTop"></div>
<!-- Back to top button -->

<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts.min.js"></script>
<script src="js/functions.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="js/video_header.js"></script>
<script>
    'use strict';
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });
</script>

</body>

</html>

