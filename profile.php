<?php 

session_start();
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require_once("classes/UserClass.php");
require_once("classes/gate.php");
require_once("classes/profile.php");
require_once("config/init.php");
require_once("config/database.php");

$user = new User();
$profile = new Profile();

if(!$isLoggedIn) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION["user_id"];

require "config/database.php";
$sql = "SELECT *  FROM users WHERE user_id = $user";
$data = $db->query($sql);
$user_data = $data->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "head.php";?>

<body style="background-image: none; background-color: #FAFCFC;">

<div id="Profile_header">
<?php include "header.php"; ?>
</div>

<div class="container main-panel" id="Profile">
	<section>
		<h5>Profile</h5>
		<div class="profile-detail">
		<form action="" method="post">

			<div class="form-group">
				<label for="fullname">Firstname</label>
				<input type="text" name="firstname" value="<?php echo $user_data["firstname"]; ?>">
			</div>

			<div class="form-group">
				<label for="fullname">Lastname</label>
				<input type="text" name="lastname" value="<?php echo $user_data["lastname"]; ?>">
			</div>

			<div class="form-group">
				<label for="fullname">Email</label>
				<input type="text" name="email" value="<?php echo $user_data["email"]; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="fullname">Contact</label>
				<input type="text" name="contact" value="<?php echo $user_data["kontak"]; ?>">
			</div>

			<div class="form-group">
				<label for="fullname"> </label>
				<input type="submit" name="profile_edit" value="Save change">
			</div>

		</form>
		</div>
	</section>

	<section>
		<h5>Set password</h5>
		<div class="profile-detail">
		<?php
			if(isset($_SESSION['fail_message'])){
				echo $_SESSION['fail_message'];
				unset($_SESSION['fail_message']); 
			} else if(isset($_SESSION['success_message'])) {
				echo $_SESSION['success_message'];
				unset($_SESSION['success_message']); 
			}
		?>
		<form action="" method="post">

			<div class="form-group">
				<label for="fullname">Current password</label>
				<input type="password" name="pass" placeholder="Enter current password" required>
			</div>

			<div class="form-group">
				<label for="fullname">New password</label>
				<input type="password" name="new_pass" placeholder="Enter new password" required>
			</div>

			<div class="form-group">
				<label for="fullname">Confirm new password</label>
				<input type="password" name="confirm_new_pass" placeholder="Confirm new password" required>
			</div>

			<div class="form-group">
				<label for="fullname"> </label>
				<input type="submit" name="password_edit" value="Set password">
			</div>

		</form>
		</div>
	</section>

	
</div>
<!-- End .container .main-panel -->

</body>
</html>
