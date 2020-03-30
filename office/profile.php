<?php 
	session_start();

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
?>
<div class="profile main-wrapper">
	<?php include 'header.php'; ?>
	<section class="profile-wrapper content">
		<h4>Profile</h4>

		<div class="card">
			<div class="profile">
				<div class="profile-image">
					<img src="assets/profile_img/<?php echo $admin_data["foto"];?>">
				</div>
				<h3><?php echo $admin_data["nama"]; ?></h3>
				<h4><?php echo $admin_data["role"]; ?></h4>
				<a href="edit_profile.php">Edit Profile</a>
			</div>

			<div class="profile-data">
				<div class="item">
					<label>Nama</label>
					<div><?php echo $admin_data["nama"]; ?></div>
				</div>
				<div class="item">
					<label>Gender</label>
					<div><?php echo $admin_data["gender"]; ?></div>
				</div>
				<div class="item">
					<label>Usia</label>
					<div><?php echo $admin_data["usia"] . " Tahun"; ?></div>
				</div>
				<div class="item">
					<label>Email</label>
					<div><?php echo $admin_data["email"]; ?></div>
				</div>
				<div class="item">
					<label>Nomor Kontak</label>
					<div><?php echo $admin_data["kontak"]; ?></div>
				</div>
				<div class="item">
					<label>Bergabung Sejak</label>
					<div><?php echo $admin_data["tanggal bergabung"]; ?></div>
				</div>
			</div>
		</div>
	</section>
</div>
</div>
<?php 
	include 'js.php';
?>
</body>
</html>