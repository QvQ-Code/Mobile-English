<?php 

session_start();
ini_set('display_errors', 0);
error_reporting( E_ALL | E_STRICT );

require("config/database.php");

$key = $_GET["fkey"];

$sql = "SELECT * FROM users WHERE fpassword_key = '$key'"; 
$data = $db->query($sql);
$user = $data->fetch_object();

$user_id = $user->user_id;
$email = $user->email;

if (isset($_POST["insertNewPass"])) {
	$user_email = $_POST["email"];
	$new_password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);
	var_dump($new_password);

	$sql = "UPDATE `users` SET `second_password` = '$new_password' WHERE `users`.`email` = '$user_email'"; 
	$set = $db->query($sql);
	
	if ($set) {
		$_SESSION["fp_message"] = "Reset password berhasil, password baru anda sudah aktif";
		unset($_GET, $_POST);
		header("location: resetPassword.php");
		exit();
	} else {
		$_SESSION["fp_message"] = "Reset password gagal!";
	}
}

?>

<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body>
<div class="reset-password">

<?php 
if (isset($_SESSION["fp_message"])) {
?>
	<div style="margin: width: 100%;
	margin: 20px auto; text-align: center;">
	<?php echo $_SESSION["fp_message"]; ?>
	</div>
<?php
}
?>

<form action="" method="POST">
	<div class="form-group">
		<h4>Set new Second password</h4>
	</div>
	<div class="form-group">
		<input type="hidden" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="form-group">
		<input type="password" name="new_password" placeholder="Enter new password" required>
	</div>
	<div class="form-group">
		<input type="submit" name="insertNewPass" value="Save">
	</div>
	<a href="login.php">Login</a>
</form>
</div>
</body>
</html>