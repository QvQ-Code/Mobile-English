<?php  

// Sesi
session_start();

// Error handling
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

// Deklarasi class
require_once("classes/action.php");
$action = new Action();

// Tempatkan setelah class!
require_once("classes/gate.php");

// Dah login belum?
if ($isLoggedIn) {
	header("Location: index.php");
	exit();
}

?>

<!DOCTYPE html>
<html>

<?php include_once "head.php";?>

<body>
<div class="login-field">
	<form action="" method="POST" enctype="multipart/form-data">
	
		<div class="form-group">
			<h4>Login</h4>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" placeholder="Enter your email here" value="<?php
				if(isset($_SESSION["ready_email"])){
					echo $_SESSION["ready_email"];
				}
			?>" required>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter your password here" required>
		</div>

		<div class="form-group check">
			<input type="checkbox" name="remember" id="remember"<?php 
				if(isset($_COOKIE["member_login"])) { ?> 
					checked
				<?php } ?>/>
			<span>Remember me</span>
		</div>

		<div class="form-group">
			<div class="form-message">

			<?php if (! empty($_SESSION["login-message"])) { ?>
			<div class="inner">
				<?php 
					echo $_SESSION["login-message"];
					unset($_SESSION["login-message"]);
				?>
			</div>
			<?php } ?>
			
			</div>
		</div>

		<div class="form-group">
			<input type="submit" name="login-user" value="Login">
		</div>

		<div class="form-group">
			<a href="forgotPassword.php">Lost Password</a>
		</div>

	</form>
	<!-- End Form -->
</div>
<!-- End .login-field -->

</body>
</html>