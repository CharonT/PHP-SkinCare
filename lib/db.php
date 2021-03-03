<?php 
	$connect=mysqli_connect("localhost","root","1234564");
	mysqli_select_db($connect,"skincare");
	mysqli_set_charset($connect,"utf8");
	if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
	}
	
?>