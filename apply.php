<?php
	session_start();
if (isset($_SESSION['candidate'])) {
	include('db_connect.php');
	$conn=db();
	$id=$_SESSION['id'];
	$name=$_SESSION['candidate'];
	$division=$_SESSION['division'];
	$contact=$_SESSION['contact'];
	$title = $_GET['title'];
	$category = $_GET['category'];
	$location = $_GET['location'];
	echo $company_id = $_GET['company_id'];

	$sql="INSERT INTO job_request values (null, '$id','$name','$division','$contact','$category','$title','$location','$company_id')";
	$result=mysqli_query($conn, $sql);
	if ($result) {


		 echo '<script type="text/javascript">
               alert("You Are Successfully Apply This Job");
            </script>';

            if (isset($_SESSION['parents_url'])) {
               $from=$_SERVER['PHP_SELF'];
               $to=$_SESSION['parents_url'];
               $final = str_replace($from, $to, $from);

                 unset($_SESSION['parents_url']);
                 echo "<script>window.location.href='$final'</script>";
                
            }else{
               echo "<script>window.location.href='index.php'</script>";
            }    

	}else{
		echo '<script type="text/javascript">
               alert("Something is wrong!");
            </script>';
      header("location:index.php");
	}

}else{
		
		$_SESSION['url']=$_GET['url'];
		
		echo '<script type="text/javascript">
		               alert("You are not login this website.\nPlease login now then apply this job.");
		         </script>';
		
		echo "<script>window.location.href='user_login.php'</script>";


		// header("location:user_login.php");
}



// <?php $_SESSION['successfully']=true; ?>

// <?php 
// <?php } ?>