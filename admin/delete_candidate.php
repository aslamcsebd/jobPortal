<?php

include ('db_connect.php');
 $conn=db();

$id=$_GET['id'];

$delete=mysqli_query($conn,"DELETE FROM candidate  WHERE id='$id'");

if($delete)
{
	echo "<script>alert('Candidate Deleted!')</script>";
	echo "<script>window.open('view_candidate.php','_self')</script>";
}

else
{
	echo "<script>alert('Failed!')</script>";
	echo "<script>window.open('view_candidate.php','_self')</script>";
}


?>