<?php 

session_start();
ini_set('display_errors', 0);
error_reporting( E_ALL | E_STRICT );

require_once("classes/action.php");
require_once("classes/gate.php");

$action = new action();

if ($isLoggedIn) {
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>

<?php include_once "head.php";?>

<body>

<div class="lost-password">
	<form action="" method="POST">

		<div class="form-group">
			<h5>Reset Second  Password</h5>
		</div>
		
		<div class="form-group">
			<div class="form-message">
				<?php if (! empty($_SESSION['lost-p-message'])) { ?>
				<div class="inner">
					<?php  
					echo $_SESSION["lost-p-message"];
					unset($_SESSION["lost-p-message"]);
					?>
				</div>
				<?php } ?>
			</div>
		</div>

		<div class="form-group">
			<input type="email" name="email" placeholder="Enter your email here" required>
		</div>

		<div class="form-group">
			<input type="submit" name="forgot-password" value="submit">
		</div>

	</form>
</div>
<!-- End Lost password -->

</body>
</html>