<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Job Portal</title>

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

</head>

<body>

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<header class="static">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="index.php" title="Job Portal">Job Portal</a></h1>
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
    <!-- container -->
</header>
<!-- /Header -->

<main>
    <div id="breadcrumb">
        <div class="container">
           <p><strong>Showing Job Details</strong></p>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <nav id="secondary_nav">
                    <div class="container">
                        <ul class="clearfix">
                            <li><a href="#section_1" class="active">Job Information</a></li>

                            <li><a href="#sidebar">Booking</a></li>
                        </ul>
                    </div>
                </nav>
                <div id="section_1">

                    <?php
                     session_start();

                    include('db_connect.php');
                    $conn=db();

                    $id = $_GET['id'];  

                     if (isset($_GET['parents_url'])) {
                        $_SESSION['parents_url']= $_GET['parents_url'];
                     }              

                    $sql = "SELECT * FROM jobs WHERE id=$id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);

                    ?>
                    <div class="box_general_3">
                        <div class="profile">
                            <div class="row">
                                <div class="col-lg-5 col-md-4">
                                    <figure>
                                        <?php

                                        echo "<img src='img/doctor_male__placeholder.svg'></a>";


                                        ?>
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    <small><?php echo $row['company'] ?></small>
                                    <h1><?php echo $row['job_title']; ?></h1>


                                    <ul class="contacts">

                                        <li>
                                            <h5>Job Details:</h5>
                                            <?php echo $row['job_details']; ?>

                                        </li>
                                        
                                        <li>
                                            <h5>Job Requirements:</h5>
                                            <?php echo $row['requirements']; ?>

                                        </li>

                                        <li>
                                            <h5>Job Experience:</h5>
                                            <?php echo $row['experience']; ?>

                                        </li>


                                        <li>
                                            <h5>Employment Status:</h5>
                                            <?php echo $row['emp_status']; ?>

                                        </li>

                                        <li>
                                            <h5>Job Vacancy:</h5>
                                            <?php echo $row['vacancy']; ?>

                                        </li>

                                        <li>
                                            <h5>Job Salary:</h5>TK.
                                            <?php echo $row['salary']; ?>

                                        </li>

                                        <li>
                                            <h5>Job Benefits:</h5>
                                            <?php echo $row['benefits']; ?>

                                        </li>

                                        <li>
                                            <h5>Company Name:</h5>
                                            <?php echo $row['company']; ?>

                                        </li>

                                        <li>
                                            <h5>Full Address</h5>
                                            <?php echo $row['division'] ?>

                                        </li>

                                        <li>
                                            <h6>Division:</h6>
                                            <?php echo $row['division']; ?>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php //echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
                       

                        <?php
                           $result=mysqli_query($conn,"SELECT * FROM job_category WHERE category_id = $row[category]");
                           $row2 = mysqli_fetch_array($result);
                           $row2['category_name'];
                           
                        ?>

                        <hr>
                        <div align="center">

                           <a href="apply.php?
                                    title=<?php echo $row['job_title']; ?>&category=<?php echo $row2['category_name']; ?>&
                                    location=<?php echo $row['location']; ?>&
                                    url=<?php echo $_SERVER['REQUEST_URI']; ?>&
                                    company_id=<?php echo $row['company_id']; ?>"

                              class="btn btn-info btn-fill pull-right">Apply Now
                           </a>
                        </div>


                        <!-- /wrapper indent -->


                        <!--  /wrapper_indent -->
                    </div>
                    <!-- /section_1 -->
                </div>
                <!-- /box_general -->


                <!-- /section_2 -->
            </div>
            <!-- /col -->

            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /main -->

<footer>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <p>
                    <a href="index.php" title="Findoctor">
                        <img src="img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
                    </a>
                </p>

                <p>Jobs Portal is an online platforms where you can easily find suitable jobs. You can get jobs details and apply for any job from our website</p>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>About</h5>
                <ul class="links">


                    <li><a href="contacts.php">Contact</a></li>

                    <li><a href="user_register.php">Register</a></li>
                    <li><a href="user_login.php">Login</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Useful links</h5>
                <ul class="links">
                    <li><a href="list.php">All Jobs</a></li>

                    <li><a href="user_register.php">Register</a></li>
                    <li><a href="user_login.php">Login</a></li>
                    <li><a href="contacts.php">Contact</a></li>
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
                <div id="copy">Copyright © 2019 Job Portal</div>
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

<script src="js/map_listing.js"></script>
<script src="js/infobox.js"></script>


</body>
</html>



