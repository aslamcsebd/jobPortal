<?php
session_start();
if (isset($_SESSION['email']))
    echo " ";
else {
    header("location:../dashboard.php");
}


?>


<!doctype html>
<html lang="en">
<head>


    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
        if it's not present, don't show loader */
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
        }
        .profile_picture img{
            width: 120px;
            height: 120px;
            border: 1px solid cyan;             
            border-radius: 0px 30px;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");

        });
    </script>

    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Candidate Details</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>
</head>
<body>


<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
       <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Admin Panel
                </a>
            </div>



            <ul class="nav">
                <li >
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="active">
                    <a href="view_candidate.php">
                        <i class="pe-7s-plus"></i>
                        <p>Candidate</p>
                    </a>
                </li>


                <li >
                    <a href="view_company.php">
                        <i class="pe-7s-plus"></i>
                        <p>Company</p>
                    </a>
                </li>

                <li >
                    <a href="view_jobs.php">
                        <i class="pe-7s-plus"></i>
                        <p>Jobs</p>
                    </a>
                </li>



                <li>
                    <a href="logout.php">
                        <i class="pe-7s-power"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>


    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Candidate Details</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>
                </div>
            </div>


        </nav>


        <div class="container">
            <?php


            include('db_connect.php');
             $conn=db();
             $id = $_GET['id'];

            $result = mysqli_query($conn, "SELECT * FROM candidate where id='$id' ");

            $row = mysqli_fetch_array($result);


            ?>




            <br>
            <div class=" col-md-offset-2 col-md-8" align="center">

                <h4 align='center'>Candidate Details</h4>
                <table class="table table-hover table-bordered">

                    <div class="profile_picture">
                        <?php if ($row['image']==null && $row['gender']=='Male') { ?>
                           
                           <img src="../profile_picture/Male.png">
                        
                        <?php }elseif ($row['image']==null && $row['gender']=='Female'){ ?>
                           
                           <img src="../profile_picture/Female.png">                        
                        
                        <?php } else{ ?>
                           <img src="<?php echo $row['image'] ?>">
                        <?php } ?>
                    </div>

                    <br>

                    <tbody>
                    <tr>
                        <td><font color="black"><b>Name</b></td>

                        <td><font color="black"><?php echo $row['name'] ?></font></td>
                    </tr>

                    <tr>
                        <td><font color="black"><b>Father</b></font></td>

                        <td><font color="black"><?php echo $row['father'] ?></td>
                    </tr>


                    <tr>
                        <td><font color="black"><b>Mother</b></font></td>

                        <td><font color="black"><?php echo $row['mother'] ?></td>
                    </tr>


                    <tr>
                        <td><font color="black"><b>Gender</b></font></td>

                        <td><font color="black"><?php echo $row['gender'] ?></td>
                    </tr>


                    <tr>
                        <td><font color="black"><b>Date of birth</b></font></td>

                        <td><font color="black"><?php echo $row['dob'] ?></td>
                    </tr>


                    <tr>
                        <td><font color="black"><b>Blood group</b></font></td>

                        <td><font color="black"><?php echo $row['blood_Group'] ?></td>
                    </tr>


                    <tr>
                        <td><font color="black"><b>Contact</b></font></td>

                        <td><font color="black"><?php echo $row['mobile'] ?></td>
                    </tr>

                    <tr>
                        <td><font color="black"><b>Email</b></font></td>

                        <td><font color="black"><?php echo $row['email'] ?></td>
                    </tr>

                    <tr>
                        <td><font color="black"><b>Division</b></font></td>

                        <td><font color="black"><?php echo $row['division'] ?></td>
                    </tr>

                    <tr>
                        <td><font color="black"><b>Address</b></font></td>

                        <td><font color="black"><?php echo $row['address'] ?></td>
                    </tr>
                    </tbody>
                </table>
                <a href="view_candidate.php" class='btn btn-success btn-fill pull-center'>Back</a>

            </div>

        </div>


    </div>

</div>


</body>


<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>


<script type="text/javascript">
    $(document).ready(function () {

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "Welcome to  Admin Panel."

        }, {
            type: 'info',
            timer: 4000
        });

    });
</script>

</html>
