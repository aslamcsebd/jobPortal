<?php
session_start();
if (isset($_SESSION['email'])){
    echo " ";
}
else{
    header("location:../dashboard.php");
}

   include('db_connect.php');   
    $conn =db();

if (isset($_POST['send'])) {

     $name = $_POST['name'];
     $mobile = $_POST['mobile'];
     $email = $_POST['email'];
     $password = $_POST['password'];

   $status = "OK";
   $msg="";


      if (empty($name)) { // checking your name
           $firstNameErr = "* Please Enter  Name!.<BR>";
           $status = "NOTOK";
      }

      else if (empty($mobile)) { // checking your name
           $phoneErr = "* Please Enter phone number!.<BR>";
           $status = "NOTOK";
      }

      else if (empty($email)) { // checking your name
           $emailErr = "* Please Enter email!.<BR>";
           $status = "NOTOK";
      }

      else if (empty($password)) { // checking your name
           $passwordErr = "* Please Enter Password!.<BR>";
           $status = "NOTOK";
      }
          

      $sql="SELECT * FROM company where name='$name'  OR email='$email'";
      $result  = mysqli_query($conn, $sql);
      $num_rows = mysqli_num_rows($result);


      if ($num_rows > 0) {
        
         echo '<script type="text/javascript">
                  alert("This Company Already Registerd!");
               </script>';


         $msg="Y";
      } else {

         $sql2="INSERT INTO company VALUES (null, '$name', '$mobile', '$email', '$password')";
         $result2  = mysqli_query($conn, $sql2);

         if ($result2) {
            echo '<script type="text/javascript">
               alert(" [ '.$name.' ] Company Successfully Registerd!");
            </script>';
         echo "<script>window.location.href='dashboard.php'</script>";


         }                    
      }
    }
?>



<!doctype html>
<html lang="en">
<head>

    <style>
        .error {
            font-family: sans-serif;
            font-style: italic;
            color: #FF0000;
        }

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

        #my_button {
            display: inline-block;
            width: 150px;
            height: 50px;
            margin: 2px;
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
            ;
        });
    </script>

    <link rel="stylesheet" href="assets/swal2/sweetalert2.min.css" type="text/css"/>

    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Add Company</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/swal2/sweetalert2.min.js"></script>


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


                   <li>
                       <a href="view_candidate.php">
                           <i class="pe-7s-plus"></i>
                           <p>Candidate</p>
                       </a>
                   </li>


                     <li class="active">
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
                    <a class="navbar-brand" href="#">Add Company</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>
                </div>
            </div>
        </nav>
        <br>

        <form role="form" id="student_info_form" name="form3" method="post" action="">

            <div class="form-group">
                <div class="col-md-8">
                    <br>


                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Company's name">
                    </div> 
                    <br> 

                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="mobile" placeholder="Company's contact">
                    </div> 
                    <br> 

                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="email" placeholder="Company's email">
                    </div> 
                    <br> 

                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="password" placeholder="Company's password">
                    </div> 
                    <br>
                   
                    <button type="submit" name="send" class="btn btn-info btn-fill pull-right">Add now</button>
                    <div class="clearfix"></div>

                    <br>
                    <br>
                </div>
            </div>

        </form>


        <script type="text/javascript">

            $(document).on('click', '#btn_submit', function (e) {
                e.preventDefault();
                swal({
                    title: "ARE YOU SURE ?",
                    text: "Want to add new Jobs?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "YES",
                    cancelButtonText: "NO",
                    closeOnConfirm: false,
                    closeOnCancel: false

                }).then(function (e) {
                    $('#student_info_form').submit();
                });
            });


        </script>
    </div>
</div>


</body>


<!--  Checkbox, Radio & Switch Plugins -->

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>
