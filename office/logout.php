<?php
	session_start();
	$_SESSION = array();  
	$destroy = session_destroy();  

	header('location: index.php');
	exit();
?>