<?php

include ('db_connect.php');
 $conn=db();
$id=$_GET['id'];

$delete=mysqli_query($conn,"DELETE FROM company  WHERE id='$id'");

if($delete)
{
	echo "<script>alert('Company Deleted!')</script>";
	echo "<script>window.open('view_company.php','_self')</script>";
}

else
{
	echo "<script>alert('Failed!')</script>";
	echo "<script>window.open('view_company.php','_self')</script>";
}


?>