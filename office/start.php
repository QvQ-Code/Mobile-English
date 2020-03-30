<?php 
	require "controller/auth.php";
	$auth = new Auth();

	$id = $_SESSION["admin_id"];
	$admin_data = $auth->getAdminById($id);
?>

<!DOCTYPE html>
<html>
<?php 
	// Including HTML Head Elements
	include 'head.php'; 
?>
<body>
<div class="container">
<?php 
	// Include sidebar, main and footer Elements, js: "Hey! how about me?".
	include 'sidebar.php';
	include 'main.php';
?>
</div>
<?php 
	include 'js.php';
?>
</body>
</html>