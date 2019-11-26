<?php

include('db_connect.php');
$conn=db();

$id = $_GET['id'];


$delete = mysqli_query($conn,"DELETE FROM job_request WHERE id='$id'");

if ($delete) {
    echo "<script>alert('Request job has been deleted!')</script>";
    echo "<script>window.open('view_job_candidate.php','_self')</script>";

} else {
    echo "<script>alert('Delete Failed!')</script>";
    echo "<script>window.open('view_jobs.php','_self')</script>";

}


?>