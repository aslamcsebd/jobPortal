<?php
   include('db_connect.php');   
    $conn =db();

if (isset($_POST['send'])) {

     $name = $_POST['name'];
     $father = $_POST['father'];
     $mother = $_POST['mother'];
     $gender = $_POST['gender'];
     $dob = $_POST['dob'];
     $blood_Group = $_POST['blood_Group'];
     $mobile = $_POST['mobile'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $division = $_POST['division'];    
     $address = $_POST['address'];

     if (!$_FILES['image']['name']==null) {
      $profile_picture_path='../profile_picture/' . $_FILES['image']['name']; 
      $profile_picture='profile_picture/' . $_FILES['image']['name']; 
      move_uploaded_file($_FILES['image']['tmp_name'],$profile_picture);
     }else{
      $profile_picture_path='';
     }

   $status = "OK";
   $msg="";


      if (empty($name)) { // checking your name
           $firstNameErr = "* Please Enter  Name!.<BR>";
           $status = "NOTOK";
      }

      else if (empty($phone)) { // checking your name
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
          

      $sql="SELECT * FROM candidate where email='$email'  OR mobile='$mobile'";
      $result  = mysqli_query($conn, $sql);
      $num_rows = mysqli_num_rows($result);


      if ($num_rows > 0) {
        
         echo '<script type="text/javascript">
                  alert("You are Already Registerd!");
               </script>';


         $msg="Y";
      } else {

         $sql2="INSERT INTO candidate VALUES (null, '$name', '$father', '$mother', '$gender', '$dob', '$blood_Group', '$mobile', '$email', '$password', '$division', '$profile_picture_path', '$address')";
         $result2  = mysqli_query($conn, $sql2);

         if ($result2) {
            echo '<script type="text/javascript">
               alert("Hello!  '.$name.' \nYou Are Successfully Registerd!");
            </script>';
         echo "<script>window.location.href='user_login.php'</script>";


         }                    
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a jobs and book online an appointment">

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
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="register" style="margin: 0px;">
					<h1>Please register to Job Portal!</h1>
					<div class="row justify-content-center">
						<div class="col-md-8">
							<form  role="form" id="student_info_form" name="form3" method="post" enctype="multipart/form-data">
								<div class="box_form">
									<div class="form-group">
                              <label>Your Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Your name" required>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Father Name</label>
                                 <input type="text" name="father" class="form-control" placeholder="Father name" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Mother Name</label>
                                 <input type="text" name="mother" class="form-control" placeholder="Mother name" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Gender</label>
                                 <select name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Date of Birth</label>
                                 <input type="date" class="form-control" name="dob" placeholder="Your email address">
                              </div>                              
                           </div>  

                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Blood Group</label>
                                 <select name="blood_Group" class="form-control" required>
                                    <option value="">Select Blood</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="N/A">Unknown</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Mobile Number</label>
                                 <input type="text" class="form-control" name="mobile" placeholder="Your Mobile number">
                              </div>                               
                           </div>

                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Email</label>
                                 <input type="email" class="form-control" name="email" placeholder="Your email address">
                              </div> 
                           
                              <div class="form-group col-md-6">
                                 <label>Password</label>
                                 <input type="password" class="form-control"  name="password" placeholder="Password">
                              </div>
                           </div>    
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Division Name</label>
                                 <select name="division" class="form-control" required>
                                    <option value="">Select Division</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Rangpur">Rangpur</option>
                                 </select>
                              </div>      
                              <div class="form-group col-md-6">
                                 <label>Profile Picture</label>
                                 <input type="file" name="image" class="form-control" id="password1" placeholder="Your password">
                              </div>
                           </div>
                           <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" name="address" rows="2" data-rule="required"
                                      placeholder="Your address"></textarea>
                           </div>

									<div class="form-group text-center add_top_30">
										<input class="btn_1" type="submit" name="send" value="Submit">
									</div>
								</div>

							</form>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /register -->
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