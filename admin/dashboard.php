<?php
session_start();
if (isset($_SESSION['email']))
    echo " ";
else
  header("location:../index.php");

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


        #my_box {
            display:inline-block;
            width: 260px;
            height: 200px;
            margin: 2px;
            font-size: 25px;
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

    <title>Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>

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
                   <li class="active">
                       <a href="dashboard.php">
                           <i class="pe-7s-graph"></i>
                           <p>Dashboard</p>
                       </a>
                   </li>


                   <li>
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
                       <a class="navbar-brand" href="#">Dashboard</a>
                   </div>
                   <div class="collapse navbar-collapse">
                       <ul class="nav navbar-nav navbar-left">

                       </ul>
                   </div>
               </div>


           </nav>


           <div class="container">




               <?php

               $getID = $_SESSION['email'];
               include('db_connect.php');
               $conn=db();

               $count_candidate = mysqli_query($conn,"SELECT * FROM candidate");
               $total_candidate=mysqli_num_rows($count_candidate);

               $count_company = mysqli_query($conn,"SELECT * FROM company");
               $total_company=mysqli_num_rows($count_company);


               $count_job = mysqli_query($conn,"SELECT * FROM jobs");
               $total_job=mysqli_num_rows($count_job);


               $result = mysqli_query($conn,"SELECT * FROM admin where email='$getID' ");

               $row = mysqli_fetch_array($result);
               ?>


               <div class="container">
                   <br><br>
                   <div>
                       <button id="my_box" type="button" class="btn btn-info btn-fill pull-left"><h3>Total Candidate</h3><h1><?php echo $total_candidate ;?></h1>
                       </button>


                   </div>



                   <div>
                       <button id="my_box" type="button" class="btn btn-info btn-fill pull-left"><h3>Total Company</h3><h1><?php echo $total_company ;?></h1>
                       </button>


                   </div>

                   <div>
                       <button id="my_box" type="button" class="btn btn-info btn-fill pull-left"><h3>Total Jobs</h3><h1><?php echo $total_job ;?></h1>
                       </button>

                   </div>



                   <br>
                    <br>
                     <br>
                     <br>
                    <br>
                     <br>




               </div>
               <br>
               <div class="col-md-12" align="justify">
                   <h2 align="center">Admin Profile</h2>
                   <table class="table table-hover table-bordered">

                       <tbody>

                       <tr>
                           <td><font color="black"><b>ID</b></td>
                           <td><font color="black">:</td>
                           <td><font color="black"><?php echo $row['id'] ?></td>
                       </tr>

                       <tr>
                           <td><font color="black"><b>Name</b></td>
                           <td><font color="black">:</td>
                           <td><font color="black"><?php echo $row['name'] ?></td>
                       </tr>

                       <tr>
                           <td><font color="black"><b>Email</b></font></td>
                           <td><font color="black">:</td>
                           <td><font color="black"><?php echo $row['email'] ?></td>
                       </tr>





                       
                       </tbody>
                   </table>



                   <div>
                       <button id="my_button" type="button" class="btn btn-info btn-fill pull-right"
                               onClick="window.open('update_admin.php','_self')">Update Information
                       </button>

                       <br><br><br>
                   </div>


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