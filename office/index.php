<?php 
	session_start();
	
	require( "controller/AdminClass.php" );
	$admin = new Admin();

	if ( $admin->isready() == true ) {
		include 'start.php';
	} else {
		include 'login.php';
	}

?>