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

    <!-- SPECIFIC CSS -->
    <link href="css/date_picker.css" rel="stylesheet">

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
                    <h1><a href="index.php" title="Jobs Portal">Job Portal</a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
              
                <div class="main-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>


                        <li><a href="list.php">All Jobs</a></li>
                       
                        <li><a href="user_register.php">Register</a></li>
                        <li><a href="user_login.php">Login</a></li>
                        <li><a href="#">Contact</a></li>


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
    <div id="results">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Showing All Jobs List . . . .</h4>
                </div>
                <div class="col-md-6">
                    <form method="post" action="list.php">
                        <div id="custom-search-input">

                            <div class="table-responsive">
                                <table width="80%" id="dynamic_field" class="table-responsive">


                                    <tr>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /results -->

    <div class="filters_listing">
        <div class="container">
            <ul class="clearfix">
                <li>

                </li>
                <li>
                    <!--
                    <h6>Layout</h6>
                    <div class="layout_view">
                        <a href="grid-list.html"><i class="icon-th"></i></a>
                        <a href="#0" class="active"><i class="icon-th-list"></i></a>
                        <a href="list-map.html"><i class="icon-map-1"></i></a>
                    </div>
                    -->
                </li>

            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /filters -->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-7">


                <?php               

                include('db_connect.php');
                $conn=db();
                $search_category = $search_division  = "";


                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    if (!isset($_POST['division'])) {
                        $search_division = "";
                    }
                    else
                    {
                        $search_division = $_POST['division'];
                    }

                    $search_query = "SELECT * FROM jobs WHERE division = '$search_division' ";




                    if (!isset($_POST['category'])) {
                        $search_category = "";
                    } else {

                        $search_category = $_POST['category'];

                        $search_query .= " AND category='$search_category'";
                    }







                }

                $category_id = '';
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                    if (isset($_GET['category_id']))
                        $category_id = $_GET['category_id'];

                }


                if (!empty($category_id)) {
                    $sql = "SELECT * FROM jobs WHERE category='$category_id' ";
                } else if (!empty($search_text) OR !empty($search_division) OR !empty($search_area) OR !empty($search_category)) {
                    $sql = $search_query;

                    //  echo $sql;
                } else {
                    $sql = "SELECT * FROM jobs";
                }
                $result = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($result);

                if ($num_rows <= 0) {

                    echo "<div class='strip_list wow fadeIn'> ";


                    echo "<h2>Sorry ! No Jobs Found!</h2>";

                    echo "</div>";

                } else {
                    while ($row = mysqli_fetch_array($result)) {


                        echo "<div class='strip_list wow fadeIn'> ";

                        echo "<figure>";

//                        if ($row['gender'] == 'Male') {
//                            echo "<img src='img/doctor_male__placeholder.svg'>";
//                        } else {
//                            echo "<img src='img/dr_female_placeholder.svg'>";
//
//                        }



                        echo "<img src='img/job-search.svg' width='60' height='60'>";
                        echo "</figure>";
                        echo "<small>" . $row['company'] . "</small>";
                        echo "<h3>" . $row['job_title']  . "</h3>";
                        echo "<p>Job Location: " . $row['location'] . "</p>";

                        $id = $row['id'];


                        echo "<ul>";
                        //echo 	"<li><a href=\"#0\" onclick=\"onHtmlClick('Doctors', 0)\" class=\"btn_listing\">View on Map</a></li>";
                        echo "<li><a href=\"https://www.google.com/maps/dir// /@22.3568472,91.7481622,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x30acd8a64095dfd3:0x5015cc5bcb6905d9!2m2!1d91.7831819!2d22.356851\" target=\"_blank\"></a></li>";
                        echo "<li><a href=\"detail-page.php?id=$id&parents_url=".$_SERVER['PHP_SELF']."\">Details</a></li>";
					 
                        echo "</ul>";
                        echo "</div>";

                    }
                }

                ?>

                <!--Pagination
                <nav aria-label="" class="add_top_20">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
                <!-- /pagination -->
            </div>
            <!-- /col -->

            <aside class="col-lg-5" id="sidebar">

               
            </aside>
            <!-- /aside -->

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
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="js/map_listing.js"></script>
<script src="js/infobox.js"></script>


</body>
</html>



