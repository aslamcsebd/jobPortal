<?php

include('db_connect.php');
$conn=db();

$id = $_GET['id'];


$delete = mysqli_query($conn,"DELETE FROM jobs WHERE id='$id'");

if ($delete) {
    echo "<script>alert('Job has been deleted!')</script>";
    echo "<script>window.open('view_jobs.php','_self')</script>";

} else {
    echo "<script>alert('Delete Failed!')</script>";
    echo "<script>window.open('view_jobs.php','_self')</script>";

}


?>