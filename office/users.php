<?php 
	session_start();

	require 'controller/auth.php';
	require 'controller/users.php';

	$auth = new Auth();
	$users = new Users();
?>


<!DOCTYPE html>
<html>

<!-- Include Head Element -->
<?php include 'head.php'; ?>

<body>
<div class="container">
	
	<!-- Include sidebar -->
	<?php include 'sidebar.php'; ?>


	<div class="main-wrapper">
		
		<!-- Include Header Element -->
		<?php include 'header.php'; ?>

		<div class="user-wrapper">

			<div class="left-side">
				<h4>Administrators</h4>

				<div class="add-admin" id="Add_admin">
					<div class="action">
						<div class="button" id="open_add_admin" onclick="add_admin_open(this)">
							Tambah admin
						</div>
						<h5 id="label_add_admin">Tambah admin</h5>
						<div id="close_add_admin" onclick="add_admin_close(this)">
							cancel
						</div>
					</div>
					<form action="users.php" method="post">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama_admin" placeholder="Enter name here" required>
						</div>
						<div class="form-group">
							<label>ID admin (username)</label>
							<input type="text" name="id_admin" placeholder="Enter id here" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password_admin" placeholder="Enter password here" required>
						</div>
						<div class="form-group">
							<input type="submit" name="add_admin" value="Tambah">
						</div>
					</form>
				</div>

				<?php 
				if (! empty($_SESSION["add_msg"])) {
				?>
					<div class="add-msg">
						<?php 
							echo $_SESSION["add_msg"];
							unset($_SESSION["add_msg"]);
						?>
					</div>
				<?php
				}
				?>

				<div class="data-list admin-list">
					<h5>Admin List</h5>

					<?php if ($_SESSION["admin_id"] == 1) { ?>

						<p>Click nama user untuk melihat detail.</p>

					<?php } else { ?>

						<p>Akses pada data admin tidak diizinkan.</p>

					<?php } ?>
					<br>

					<?php  
					// Take admin data
					$data = $auth->executeNotRow("SELECT * FROM user_section_admin WHERE is_active = 1");



					while ($admin_data = $data->fetch_assoc()) {
					?>

					<div class="item">
						<div class="avatar">
							<?php if (!empty($admin_data["foto"])) { ?>
							<img src="assets/profile_img/<?php echo $admin_data["foto"]; ?>">
							<?php } ?>
						</div>
						<div class="mini-detail">
							<div class="name">
								<a href="#"><?php echo $admin_data["nama"]; ?></a>
							</div>
							<div class="last-login">
								Bergabung sejak <?php echo $admin_data["tanggal bergabung"]; ?>
							</div>
						</div>

						<?php if ($_SESSION["admin_id"] == 1): ?>
						<div class="delete-record">
							<abbr title="Delete this user"><a href="users.php?admin_delete_uid=<?php echo $admin_data["admin_id"]; ?>" class="delete" data-confirm="Anda yakin ingin menghapus user ini?">&times;</a></abbr>
						</div>
						<?php endif ?>
					</div>

					<?php
					}
					?>

				</div>
				<!-- End .admin-list -->
			</div>
			<!-- End .left-side -->

			<div class="right-side">
				<h4>Member</h4>

				<div class="add-admin" id="Add_member">
					
					<div class="action">
						<div class="button" id="open_add_member" onclick="add_member_open(this)">
							Tambah member
						</div>
						<h5 id="label_add_member">Tambah admin</h5>
						<div id="close_add_member" onclick="add_member_close(this)">
							cancel
						</div>
					</div>


					<form action="users.php" method="post">
						<div class="form-group">
							<label>Nama depan</label>
							<input type="text" name="nama_depan" placeholder="Enter firstname here" required>
						</div>
						<div class="form-group">
							<label>Nama Belakang</label>
							<input type="text" name="nama_belakang" placeholder="Enter Lastname here" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="user_email" placeholder="Enter email here" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="user_password" placeholder="Enter password here">
						</div>
						<div class="form-group">
							<label>Second Password</label>
							<p>Second Password harus berbeda dengan password pertama. second password digunakan untuk menggambil account jika user kehilangan akses dengan password pertama.</p>
							<input type="password" name="second_password" placeholder="Enter second password here">
						</div>
						<div class="form-group">
							<input type="submit" name="add_member" value="Tambah">
						</div>
					</form>
				</div>

				<?php 
				if (! empty($_SESSION["add_member_msg"])) {
				?>
					<div class="add-msg">
						<?php 
							echo $_SESSION["add_member_msg"];
							unset($_SESSION["add_member_msg"]);
						?>
					</div>
				<?php
				}
				?>

				<div class="data-list member-list">
					<h5>Member List</h5>
					<p>Click email user untuk melihat detail.</p>
					<br>

					<?php  
					// Take admin data
					$data = $auth->executeNotRow("SELECT * FROM users WHERE is_active = 1");

					while ($user_data = $data->fetch_assoc()) {
					?>

					<div class="item">
						<div class="avatar">
							<?php if (!empty($user_data["foto"])) { ?>
							<img src="assets/profile_img/<?php echo $user_data["foto"]; ?>">
							<?php } ?>
						</div>
						<div class="mini-detail">
							<div class="name">
								<a href="users_detail.php?uid=<?php echo $user_data["user_id"] ?>"><?php echo $user_data["email"];?></a>
							</div>
							<div class="last-login">
								Bergabung sejak <?php echo $user_data["join_on"]; ?>
							</div>
						</div>
						<div class="delete-record">
							<abbr title="Delete this user"><a href="users.php?member_delete_uid=<?php echo $user_data["user_id"]; ?>" class="delete" data-confirm="Anda yakin ingin menghapus user ini?">&times;</a></abbr>
						</div>
					</div>

					<?php
					}
					?>

				</div>
			</div>

		</div>
		<!-- End .user-wrapper -->

	</div>
	<!-- End .main-wrapper -->


</div>

<!-- Include Js script-->
<?php include 'js.php'; ?>
</body>
</html>