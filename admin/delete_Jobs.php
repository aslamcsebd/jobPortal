<?php

include ('db_connect.php');
 $conn=db();
$id=$_GET['id'];

$delete=mysqli_query($conn,"DELETE FROM jobs  WHERE id='$id'");

if($delete)
{
	echo "<script>alert('Delete Job!')</script>";
	echo "<script>window.open('view_Jobs.php','_self')</script>";
}

else
{
	echo "<script>alert('Failed!')</script>";
	echo "<script>window.open('view_Jobs.php','_self')</script>";
}


?>