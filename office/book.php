<?php 
	session_start();
	ini_set("display_errors", 1);

	require "controller/auth.php";
	$auth = new Auth();
?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>

	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="book-wrapper">
			
			<div class="nav">
				<h4 style="width: 100%;">Action</h4>
				<a href="new_book.php">Add a book</a>
			</div>

			<h4>Books</h4>

			<?php 
				$execute = $auth->executeNotRow("SELECT * FROM book");
				while ( $data = $execute->fetch_assoc() ) {
			?>

			<div class="book">
				<div class="cover">
					<img src="assets/uploads/<?php echo $data['cover_img'];?>">
				</div>
				<div class="title">
					<p><?php echo $data['name'];?></p>
				</div>
				<div class="button">
					<a href="book_detail.php?book_ref=<?php echo $data['book_id'];?>">View</a>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>
</div>
	<?php include 'js.php'; ?>
</body>
</html>
