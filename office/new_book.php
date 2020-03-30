<?php 

	session_start();

	require "controller/auth.php";
	require "controller/book.php";
	$book = new Book();

?>

<!DOCTYPE html>
<html>
		<?php include 'head.php'; ?>
<body>
<div class="container">	
		<?php include 'sidebar.php'; ?>
		<div class="main-wrapper">	
				<?php 	include 'header.php'; ?>

				<div class="book-wrapper">	
						<h4>Add new book</h4>

						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Cover Buku</label>
								<input type="file" name="book_cover">
							</div>
							<div class="form-group">
								<label>Judul buku</label>
								<input type="text" name="book_title" placeholder="...." required>
							</div>
							<div class="form-group">
								<label>Harga buku</label>
								<input type="text" name="book_price" placeholder="...." required>
							</div>
							<div class="form-group">
								<label>Deskripsi Buku</label>
								<textarea name="editor_content" id="myEditor" required>
			            
			          </textarea>
			          <script>CKEDITOR.replace( 'editor_content' );</script>
							</div>
							<div class="form-group">
								<input type="submit" name="new_book" value="save">
							</div>
						</form>
				</div>	

		</div>
</div>
		<?php include 'js.php'; ?>
</body>
</html>