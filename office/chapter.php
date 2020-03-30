<?php 
	session_start();

	require 'controller/auth.php';
	require 'controller/book.php';

	$book_id = $_GET["book_ref"];
	$ch_ref = $_GET["ch_ref"];
	$auth = new Auth();
	$book = new Book();

	$chapter = $auth->executeNotRow("SELECT * FROM book_chapter WHERE chapter_id = '$ch_ref'");

	// Vars
	$chapter_data = $chapter->fetch_assoc();
?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="chapter-view">

			<div class="nav">
				<h4>Action</h4>
				<a href="chapter_edit.php?book_ref=<?php echo $book_id;?>&ch_ref=<?php echo $chapter_data["chapter_id"];?>">edit</a>
				<a style="background-color: coral" href="#">delete</a>
			</div>

			<div class="paper">
				<h4>Chapter <?php echo $chapter_data["chapter"]; ?></h4>
				<div class="content">
					<h3><?php echo $chapter_data["heading"]; ?></h3>
					<?php echo $chapter_data["content"]; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>