<?php 
	session_start();

	require "controller/auth.php";
	require "controller/book.php";
	$auth = new Auth();
	$book = new Book();
?>

<!DOCTYPE html>
<html>
	<?php include 'head.php';?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="book-wrapper book-detail">
			<?php
				$book_id = $_GET["book_ref"];
				$execute = $auth->executeNotRow("SELECT * FROM book WHERE book_id = '$book_id'");
				$data = $execute->fetch_assoc();
			?>

			<h4>Action</h4>

			<div class="nav">
				<a href="book_detail_edit.php?bid=<?php echo $data["book_id"]; ?>">Edit detail</a>
				<a href="book_add_chapter.php?bid=<?php echo $data["book_id"]; ?>">Add chapter</a>
				<a style="background-color: red;" href="book_detail.php?book_ref=<?php echo $data["book_id"]; ?>&delete_bid=<?php echo $data["book_id"]; ?>" onclick="confirm('Anda yakin ingin menghapus buku ini?')">Delete This Book</a>
			</div>

			<h4 style="width: 100%; ">Book detail</h4>

			<div class="item book_details">
				<div class="book-cover">
					<label>Cover Buku</label>
					<img src="assets/uploads/<?php echo $data["cover_img"]; ?>">
				</div>
				<div class="title">
					<label>Judul</label>
					<?php echo $data["name"]; ?>
				</div>
				<div class="price">
					<label>Harga</label>
					<?php echo number_format($data["harga"],2,",","."); ?>
				</div>
				<div class="desc">
					<label>Deskripsi Buku</label>
					<?php echo $data["sinop"]; ?>
				</div>
			</div>
			<div class="item chapter-list">

				<?php 
					$chapter = $auth->executeNotRow("SELECT DISTINCT chapter FROM book_chapter WHERE book_id = '$book_id' ORDER BY chapter");
					$num = mysqli_num_rows($chapter);
				?>

				<label>Chapter List</label>

				<p>
					<?php 
						if ($num < 1) {
							echo "Chapter belum tersedia.";
						} else {
							echo "Buku ini memiliki " . "89" . " chapter.";
						}
					?>
				</p>

				<?php 
					while ($chap = $chapter->fetch_assoc()) {
				?>

				<div class="list-item">
					<div class="num"><?php echo $chap["chapter"];?>.</div>
					<div class="chap">
						<?php 
							$ch = $chap['chapter'];
							$heading = $auth->executeNotRow("SELECT DISTINCT heading FROM book_chapter WHERE book_id = $book_id AND chapter = $ch");  
							$head = $heading->fetch_assoc();
						?>
						<div><?php echo $head["heading"];?></div>
						<div class="btn">
							<a href="chapter.php?book_ref=<?php echo $data["book_id"];?>&ch_ref=<?php echo $chap["chapter_id"];?>">view</a>
							<a href="chapter_edit.php?book_ref=<?php echo $data["book_id"];?>&ch_ref=<?php echo $chap["chapter"];?>">edit</a>
							<a style="background-color: coral" href="">delete</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>

	</div>
</div>
<?php include 'js.php'; ?>
</body>
</html>