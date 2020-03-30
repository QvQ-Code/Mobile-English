<?php 

session_start();

if (isset($_POST["reclaim-account"])) {
	$isAuthenticated = false;
	$user_ref = $_SESSION["reclaim_ref"];
	$second_password = $_POST["second_password"];

	require("classes/db.php");
	$sql = "SELECT * FROM users WHERE user_id ='$user_ref'";
	$execute = $db->query($sql);
	$row = $execute->fetch_assoc();

	if (password_verify($second_password, $row["second_password"])) {
		$isAuthenticated = true;
	}

	if ($isAuthenticated) {
		$ssid = session_id();
		$user_id = $row["user_id"];
		$_SESSION["user_id"] = $row["user_id"];
		
		require("classes/db.php");
		$sql = "UPDATE `users` SET `ssid` = '$ssid' WHERE `users`.`user_id` = $user_id";
		$execute = $db->query($sql);

		header("location: index.php");
		exit();
	} else {
		$_SESSION["reclaim-message"] = "Invalid second password!";
	}
}

?>

<!DOCTYPE html>
<html>
<?php include_once("head.php");?>
<body>

<div class="reclaim-field">
<form action="" method="post" enctype="multipart/form-data" class="reclaim-form">
	<div class="form-group">
		<h4>Reclaim Account</h4>
	</div>
	<div class="form-group">
		<input type="password" name="second_password" placeholder="Enter your second password" required>
	</div>
	<div class="form-group">
		<div class="form-message">
			<?php if (! empty($_SESSION["reclaim-message"])) { ?>
			<div class="inner">
				<?php
				echo "<div style='padding: 15px'>" . $_SESSION["reclaim-message"] . "</div>";
				unset($_SESSION["reclaim-message"]);
				?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" name="reclaim-account" value="Reclaim">
	</div>
	<div class="form-group">
		<a href="second_pass_reset.php">Reset second password</a>
	</div>
</form>
</div>

</body>
</html>