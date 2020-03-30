<?php

require('init.php');

$db = mysqli_connect($hostname, $username, $password, $dbname);

/* If connection fails for some reason */
if ($db->connect_error) {
	die("Database connection failed: ". $conn->connect_error);
}

?>