<?php

$conn=mysqli_connect("localhost","root","1234564");

mysqli_select_db($conn, 'skincare') or die(mysqli_error($conn));

mysqli_query($conn,"SET NAMES 'utf8'");

?>

