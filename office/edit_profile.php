<?php 
	session_start();

	require "controller/auth.php";
	require "controller/action.php";
	$auth = new Auth();
	$action = new Action();

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
?>
<div class="edit-profile main-wrapper">
	<?php include 'header.php'; ?>
	<div class="edit-profile-wrapper">
		<h4>Edit Profile</h4>

		<form action="" method="post" enctype="multipart/form-data">
		<div class="column">
			<label>Foto profile saat ini</label>
			<div class="profile-image">
				<img src="assets/profile_img/<?php echo $admin_data["foto"]; ?>" alt="profile-image">
			</div>
			<div class="form-group">				
				<input type="hidden" name="uid" value="<?php echo $_SESSION["admin_id"]; ?>">
			</div>
			<div class="form-group">
				<label>Ganti foto profile</label>
				<input type="file" name="foto" value="<?php echo $_SESSION["foto"]; ?>">
			</div>
			<div class="form-group">
				<label>Role</label>
				<input type="text" name="role" value="<?php echo $admin_data["role"]; ?>" placeholder="Type Your Role!">
			</div>
		</div>
		<div class="column">
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="name" placeholder="Enter your name" value="<?php echo $admin_data["nama"]; ?>">
			</div>
			<div class="form-group">
				<label>Gender</label>
				<select name="gender">
					<option value="Laki-laki" <?php 
					if ($admin_data["gender"] == "Laki-laki") {
					?>
						selected
					<?php
					}
					 ?>>Laki - Laki</option>
					<option value="Perempuan" <?php 
					if ($admin_data["gender"] == "Perempuan") {
					?>
						selected
					<?php
					}
					 ?>>Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Usia</label>
				<input type="text" name="age" placeholder="Enter your age" value="<?php echo $admin_data["usia"]; ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" placeholder="Enter your email" value="<?php echo $admin_data["email"]; ?>">
			</div>
			<div class="form-group">
				<label>Kontak</label>
				<input type="text" name="contact" placeholder="Enter your contact" value="<?php echo $admin_data["kontak"]; ?>">
			</div>
			<div class="form-group">
				<input type="submit" name="edit_profile" value="Simpan">
			</div>
		</div>
		</form>
	</div>
</div>
</div>
<?php 
	include 'js.php';
?>
</body>
</html>