<main id="main" class="main-wrapper">
	<?php include 'header.php'; ?>

	<section class="content">
		<!-- Start Div -->
		<div class="profile">
			<div class="profile-image">
				<img src="assets/profile_img/<?php echo $admin_data["foto"];?>">
			</div>
			<h3><?php echo $admin_data["nama"]; ?></h3>
			<h4><?php echo $admin_data["role"]; ?></h4>
			<a href="profile.php">See Profile</a>
		</div>
		<!-- End Div -->

		<!-- Start Div -->
		<div class="analytic">

			<?php 
				// Payment data
				$data = $auth->executeNotRow("SELECT * FROM user_payment WHERE status = 1");
				$count_payment_data = mysqli_num_rows($data);

				// Users data
				$data = $auth->executeNotRow("SELECT * FROM users");
				$count_users_data = mysqli_num_rows($data);				
			?>

			<div class="box">
				<h4>Payment Confirmation</h4>
				<p class="count"><?php echo $count_payment_data; ?></p>
				<p class="text">Pembayaran yang perlu dikonfirmasi</p>
				<a class="button" href="payment.php">View</a>
			</div>
			<div class="box">
				<h4>Total User</h4>
				<p style="color: green" class="count"><?php echo $count_users_data; ?></p>
				<p class="text">User Terdaftar</p>
			</div>
		</div>
		<!-- End Div -->

		<!-- Start Div -->
		<div class="book-list">

			<?php
				// Execute
				$data = $auth->executeNotRow("SELECT * FROM book");
				$count_book_data = mysqli_num_rows($data);
				$i = 1;
			?>

			<div class="list-head">
				<h4>Book List</h4>
				<p class="text">Total <?php echo " " . $count_book_data . " " ?> Buku Tersedia saat ini.</p>
			</div>

			<?php  
			while ($book_data = $data->fetch_assoc()) {	
			?>
			<div class="list-item">
				<div class="num"><?php echo $i++ ?>. </div>
				<a href="book_detail.php?book_ref=<?php echo $book_data['book_id'];?>"><?php echo $book_data["name"]; ?></a>
				<div class="arrow"><i class="material-icons">keyboard_arrow_right</i></div>
			</div>
			<?php
				}
			?>

			<div class="list-footer"></div>
		</div>
		<!-- End Div -->
	</section>
</main>