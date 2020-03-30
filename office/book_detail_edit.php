<?php 
	session_start();

	require 'controller/auth.php';
	require 'controller/book.php';

	$auth = new Auth();
	$book = new Book();

	$book_id = $_GET["bid"];
?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="book-wrapper book-detail-edit">

			<?php 
				$result = $auth->executeNotRow("SELECT * FROM book WHERE book_id = '$book_id'");
				$data = $result->fetch_assoc();
			?>

			<form action="" method="POST" enctype="multipart/form-data">
				<h4>Edit - Book detail</h4>
				<div class="form-group">
					<div class="book-cover">
						<img src="assets/uploads/<?php echo $data["cover_img"];?>">
					</div>
				</div>
				<div class="form-group">
					<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
				</div>
				<div class="form-group">
					<label>Cover Buku</label>
					<input type="file" name="cover-buku">
				</div>
				<div class="form-group">
					<label>Judul</label>
					<input type="text" name="judul" value="<?php echo $data["name"]; ?>">
				</div>
				<div class="form-group">
					<label>harga</label>
					<input type="text" name="harga" value="<?php echo $data["harga"]; ?>">
				</div>
				<div class="form-group">
					<label>Deskripsi buku</label>
					<textarea name="desc_content" id="myEditor" required>
			        	<?php echo $data["sinop"];?>    
			        </textarea>
			        <script>CKEDITOR.replace( 'desc_content' );</script>
				</div>
				<div class="form-group">
					<input type="submit" name="edit_book_detail" value="save">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>