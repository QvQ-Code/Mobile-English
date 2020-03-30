<?php 

session_start();

require 'controller/auth.php';
require 'controller/users.php';

$auth = new Auth();
$users = new Users();

if (isset($_GET["uid"])) {
	$uid = $_GET["uid"];
	$_SESSION["user_detail"] = $uid;
}

$user = $_SESSION["user_detail"];
$sql = "SELECT * FROM users WHERE user_id = $user";
$data = $auth->executeNotRow($sql);
$user_data = $data->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>
		<div class="user-detail">
			<h4>User Profile</h4>

			<div class="flex-item">
				<div class="img-thumbnail">
					<?php if (!empty($user_data["foto"])): ?>
						<img src="<assets/profile_img/<?php echo $user_data["foto"]; ?>>">
					<?php endif ?>
				</div>

				<?php if ($user_data["is_active"] == 1): ?>
				<div class="delete-record">
					<abbr title="Delete this user">
						<a href="users_detail.php?member_delete_uid=<?php echo $user_data["user_id"]; ?>" class="delete" data-confirm="Anda yakin ingin menghapus member ini?">
						Delete member
						</a>
					</abbr>
				</div>
				<?php endif ?>

				<?php if ($user_data["is_active"] == 0): ?>
				<div class="delete-record">
					<abbr title="Activate this user">
						<a href="users_detail.php?member_activate_uid=<?php echo $user_data["user_id"]; ?>" class="delete" data-confirm="Anda yakin ingin mengaktifkan user ini kembali?">
						Activate member
						</a>
					</abbr>
				</div>
				<?php endif ?>

			</div>
			<!-- End Flex item -->

			<div class="flex-item">
				
				<div class="name">
					<?php echo $user_data["firstname"] . " " . $user_data["lastname"] ?>			
				</div>
				<div class="email"><?php echo $user_data["email"];?></div>
				<div class="join">
					bergabung pada <?php echo $user_data["join_on"]; ?>
				</div>
				
				<h4 class="h-about">About</h4>
				<div class="info">
					<div>Alamat</div>
					<p><?php echo $user_data["alamat"]; ?></p>
				</div>
				<div class="info"> 
					<div>Kontak</div>
					<p><?php echo $user_data["kontak"]; ?></p>
				</div>
				<br><br>
				<form action="" method="post">
					<h4>
						Ganti password member ini
					</h4>
					<p>
						Sebagai administrator Anda dapat merubah password dari user ini secara langsung.
					</p>
					<p>
						Gunakan fitur ini hanya saat benar-benar diperlukan!
					</p>
					<div class="form-group">
						<input type="hidden" name="user_id" value="<?php echo $user_data["user_id"]; ?>">
					</div>

					<?php if (!empty($_SESSION["new_password_msg"])): ?>
						<div style="border-left: 3px solid red; padding: 15px 20px; margin-bottom: 20px;">
							<?php 
								echo $_SESSION["new_password_msg"];
								unset($_SESSION["new_password_msg"]);
							?>
						</div>
					<?php endif ?>

					<div class="form-group">
						<label>New password</label>
						<input type="password" name="new_password" placeholder="Enter new password here" required>
					</div>
					<div class="form-group">
						<input type="submit" name="user_new_password" value="Change password">
					</div>
				</form>
			</div>
			<!-- End flex item -->

		</div>
		<!-- END user-detail -->

	</div>
	<!-- END Main Wrapper -->
</div>
</body>
</html>