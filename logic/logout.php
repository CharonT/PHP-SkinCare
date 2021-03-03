<?php 
	session_start();
	if(!isset($_SESSION['currAdmin'])){
		session_destroy();
	$newURL='../web/index.php';
	header('Location: '.$newURL);	
		}else{
			session_destroy();
		$newURL='../login.php';
		header('Location: '.$newURL);	
			
			}
	

?>