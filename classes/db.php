<?php

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "mobile_english_ebook";

    $db = mysqli_connect($hostname, $username, $password, $database);

    /* If connection fails for some reason */
    if ($db->connect_error) {
        die("Database connection failed: ". $conn->connect_error);
    }

?>
