<?php
	// session_start();
	function db() {
		$conn =mysqli_connect('localhost','root','','job_portal');
		return $conn;
	}
?>