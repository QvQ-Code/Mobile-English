<!DOCTYPE html>
<html>

<?php 
	include 'head.php';
?>

<body class="admin-login-body">
	<div class="admin-login-container">
		<div class="caption">
			<div class="head">
				<span>&#8226;</span>
				<p>Mobile English</p>
			</div>
			<div class="body">
				<h1>Selamat datang kembali!</h1>
				<p>Masukan ID dan</p>
				<p>Password untuk melanjutkan.</p>
			</div>
		</div>
		<!-- End .caption -->

		<form action="" name="adminLogin" method="post">
			<div class="form-item">
				<h1>Login</h1>
				<h3>To Access the portal</h3>
			</div>
			<div class="form-item">
				<div class="input-wrap">
					<!--For modern browsers-->
					<i class="material-icons">person
					</i>

					<input type="text" name="username" placeholder="Enter User Name Here" required>
				</div>
			</div>
			<div class="form-item">
				<div class="input-wrap">
					<!--For modern browsers-->
					<i class="material-icons">
					vpn_key
					</i>

					<input type="password" name="password" placeholder="Enter Password Here" required>
				</div>
			</div>

			<div class="form-item danger-box">
				<!-- Jika tersedia $_SESSION['admin_login_message'] maka tampilkan ! -->
				<?php if(!empty($_SESSION['admin_login_message'])): ?>
					<center><strong><?php echo htmlentities($_SESSION['admin_login_message']); ?></strong></center>
				<?php endif; ?>
			</div>

			<div class="form-item">
				<input type="submit" name="admin-login" value="Go!">
			</div>
			<div class="form-item">
				<a href="#">Lost Password</a>
			</div>
		</form>
		<!-- End Form--->
	</div>
</body>
</html>