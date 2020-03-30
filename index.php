<?php 

session_start();

ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require("classes/gate.php");

if ($isLoggedIn) {
  include_once "loginTrue.php";
} else {
  include_once "loginFalse.php";
}

?>