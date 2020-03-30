<?php 

session_start();
ini_set('display_errors', 0);
error_reporting( E_ALL | E_STRICT );

require_once("classes/UserClass.php");
require_once("classes/gate.php");
require_once("config/database.php");

$user = new User();

if(!$isLoggedIn) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<?php 
	include "head.php";
?>
<body>
<?php 
	include "header.php";
?>
<div class="container addbook-container">
<?php 
	include "parts/book_package.php";
?>
</div>
<!-- End .container .addbook-container -->

</body>
</html>


