<?php 
	
	ini_set("display_errors", 0);
	require("config/database.php");

	$user_id = $_SESSION['user_id'];

	$sql = "SELECT users_book_catalog.*, book.* FROM users_book_catalog INNER JOIN book ON users_book_catalog.book_id = book.book_id";
	$query = $db->query($sql);

?>	

<div id="Book" class="book-list d-flex flex-row" style="">
	<div class="my-book">My Ebook(s)</div>
	<p class="guide">Click your ebook to open it.</p>
	<?php
		while ($row = $query->fetch_assoc()) {

			$user_book_date = 	$row["timestamp"];
			$user_book_exp = date("Y-m-d", strtotime(date("Y-m-d", strtotime($user_book_date)). " + 360 day"));

			$book_id = $row['book_id'];
			$num++;

			$sql2 = "SELECT book.*, book_chapter.* FROM book INNER JOIN book_chapter ON book.book_id = book_chapter.book_id WHERE book.book_id =".$book_id;
			$query2 = $db->query($sql2);
			$chap_data = $query2->fetch_assoc();
			if(date("Y-m-d") < $user_book_exp){
	?>

	<a href="read.php?book_ref=<?php echo $row['book_id'];?>&chap_ref=<?php echo $chap_data['chapter']; ?>">

		<div class="item">
			<div class="num">
				<?php echo $num . ".";?>
			</div>

			<div class="desc">
				<p class="title"><?php echo $row['name'];?></p>
			</div>
		</div>
		<div class="expired">
			Expired on <?php echo $user_book_exp; ?>
		</div>
		<!-- End .item -->
	</a>

	<?php 
			}
		} 
	?>

</div>
<!-- End .book-list d-flex flex-column -->