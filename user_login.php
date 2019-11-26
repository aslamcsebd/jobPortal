<?php

//if (isset($_SESSION['email']))
//{
//    header("location:admin/dashboard.php");
//
//}
//else
//{
//    echo "";
//}




$submit="";

$status = "OK";
$msg="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $email=$_POST['email'];
    $password=$_POST['password'];


    if (empty($email)) {
        $msg .="Please Enter Your Email.<br>";
        $status= "NOTOK";
    }


    if (empty($password)) {
        $msg .="Please Enter Your password.";

        $status= "NOTOK";}

    if($status=="OK"){


     include('db_connect.php');
     $conn=db();
    session_start();
    

        $result=mysqli_query($conn,"SELECT * FROM admin WHERE email='$email' and password='$password'");


        $count=mysqli_num_rows($result);



        $result2=mysqli_query($conn,"SELECT * FROM candidate WHERE email='$email' and password='$password'");


        $count2=mysqli_num_rows($result2);


        $result3=mysqli_query($conn,"SELECT * FROM company WHERE email='$email' and password='$password'");


        $count3=mysqli_num_rows($result3);

        if($count==1){

            $row = mysqli_fetch_array($result);

            $_SESSION['email']= $row['email'] ;

            header("location:admin/dashboard.php");
        }

       else if($count2==1){

            $row = mysqli_fetch_array($result2);

            $_SESSION['email']= $row['email'] ;
            $_SESSION['id']= $row['id'] ;
            $_SESSION['candidate']= $row['name'] ;
            $_SESSION['division']= $row['division'] ;
            $_SESSION['contact']= $row['mobile'] ;
            // ob_start();
            if (isset($_SESSION['url'])) {
               $from=$_SERVER['PHP_SELF'];
               $to=$_SESSION['url'];
               $final = str_replace($from, $to, $from);

                  unset($_SESSION['url']);
                 echo "<script>window.location.href='$final'</script>";
                
            }else{
                header("location:candidate/dashboard.php");
            }            
        }


       else if($count3==1){

            $row = mysqli_fetch_array($result3);

            $_SESSION['email']= $row['email'] ;
            // ob_start();

            header("location:company/dashboard.php");
        }


        else {


            $msg= "Wrong Email or Password !!!";

           // echo "<div class='alert-danger' align='center'>".$msg ."</div";

        }
    }
    else {
       // echo "<div class='alert-danger' align='center'>".$msg ."</div";
    }

}


?>






<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>Job Portal</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

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
    
	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.php" title="Job Portal">Job Portal</a></h1>
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
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login-2">
					<h1>Please login to Job Portal!</h1>
					<form action="user_login.php" method="post">
						<div class="box_form clearfix">
							<div class="box_login">
								<center><img src="img/my_logo.png" width='150' height='150'/></center>
							</div>
							<div class="box_login last">
                                <a href="#0" class="forgot"><small><?php echo $msg ; ?></small></a>
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Your email address">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Your password">
									<a href="#0" class="forgot"><small>Forgot password?</small></a>
								</div>
								<div class="form-group">
									<input class="btn_1" type="submit" value="Login">
								</div>
							</div>
						</div>
					</form>
					<p class="text-center link_bright">Do not have an account yet? <a href="user_register.php"><strong>Register now!</strong></a></p>
				</div>
				<!-- /login -->
			</div>
		</div>
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
                        <li><a href="about.php">About us</a></li>
                       
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
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5>Contact with Us</h5>
                    <ul class="contacts">
                        <li><a href="tel://8801621747060"><i class="icon_mobile"></i>+88 01621747060</a></li>

                        <li><a href="mailto:info@Job Portal.com"><i class="icon_mail_alt"></i> info@Job Portal.com</a></li>
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
    </footer>	<!--/footer-->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts.min.js"></script>
	<script src="js/functions.js"></script>
     


</body>
</html>