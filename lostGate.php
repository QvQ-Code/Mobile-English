<?php 

session_start();
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require_once("classes/action.php");
$action = new Action();


require_once("classes/gate.php");

if ($isLoggedIn) {
	header("Location: index.php");
	exit();
}

?>