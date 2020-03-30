<?php 
	session_start();
	require 'config/database.php';


		$user_id = $_SESSION["user_id"];
		$SQL = "SELECT * FROM user_book_catalog WHERE user_id = $user_id";
		$execute = $db->query($sql);
		if (!$execute) {
			header("location: index.php");
			exit();
		}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
<?php include "header.php"; ?>

<section class="books-ourbook">
<?php 
	require 'config/database.php';
	$sql = "SELECT * FROM book";
	$execute = $db->query($sql);
?>
<h4 class="section-title">Our Books Showcase</h4>
<div class="book-wrapper">
<?php while ($book = $execute->fetch_assoc()) { ?>
	<div class="item">
		<a href="addBookDetail.php?id=<?php echo $book['book_id'];?>">
		<img src="assets/uploads/<?php echo $book["cover_img"];?>">
		</a>
	</div>
<?php } ?>
</div>
</section>

<?php include "footer.php"; ?>
</body>
</html>