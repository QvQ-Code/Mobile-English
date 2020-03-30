<?php	

require "classes/UserClass.php";
require "config/database.php";
$user = new user();

?>

<!DOCTYPE html>
<html lang="en">

<?php 

include "head.php";

?>

<!-- Body Start! -->
<body class="login-true-body" style="background-color: #FAFCFC;">

<?php 

include "header.php"

;?>

<div class="container logintrue-panel login-true">

	<?php 
	
	// Select user book data
	$uid = $_SESSION['user_id'];
	$book_count = $db->query("SELECT book_id FROM users_book_catalog WHERE user_id = $uid");
	$row = mysqli_num_rows($book_count);
	if($row == 0){	

	?>

	<div class="book-collection">
		Your E-book Collection 
		<a class="btn btn-primary" href="addBook.php">+ ADD e-book</a><br>
	</div>	
	
	<?php
	} 
	?>

	<!-- Book List -->
	<div class="book_true">
	<main>

		<?php 

		// Trial
		if ($user->Trial() == true): 

		?>
		
		<div class="trial-book">
			<div style="margin-bottom: 10px;">Trial Book</div>

			<?php 

			require("config/database.php");
			$sql = "SELECT * FROM book_trial";
			$execute = $db->query($sql);
			$book_trial = $execute->fetch_assoc();
			$target = (int) $book_trial["book_id"];

			$second_sql = "SELECT book.*, book_chapter.* FROM book INNER JOIN book_chapter ON book.book_id = book_chapter.book_id WHERE book.book_id = $target";
			$second_execute = $db->query($second_sql);
			$book_data = $second_execute->fetch_assoc();

			?>

			<div class="book-list d-flex flex-row">
				<a href="read.php?book_ref=<?php echo $book_data['book_id'];?>&chap_ref=<?php echo $book_data['chapter']; ?>">

					<div class="item">
						<div class="num">
							<?php 
								$a = 0; 
								$a++; 
								echo $a . ".";
							?>
						</div>

						<div class="desc">
							<p class="title"><?php echo $book_data['name'];?></p>
						</div>
					</div>
					<!-- End .item -->
				</a>
				</div>

			</div>

		<?php 
			
		endif;
		// Trial END

		// Check punya buku || tidak
		if ($user->isHaveABook() == true) {
			include_once "bookTrue.php";

		?>

			<div class="lesson_of_the_day" id="Lesson">
				<h5>Lesson of the Day</h5><br>

		<?php 

		$statement = "SELECT * FROM site_lesson WHERE status = 'Active' ORDER BY id DESC";
		$execute_query = $db->query($statement);
		while ($lesson_of_the_day_data = $execute_query->fetch_assoc()) {

		?>
				<div class="lesson-list">
					<h6>
					
					<?php 
					
					echo $lesson_of_the_day_data["title"];
					
					?>
					
					</h6>
					<div class="content">

					<?php 
						
					echo $lesson_of_the_day_data['content']; 
						
					?>

					</div>
					<div style="margin-top: 10px">

					<?php 
						
					if (isset($_SESSION["user_id"])) {
					
					?>

						<a href="lesson_of_the_day_extend.php?lesson_id=<?php echo $lesson_of_the_day_data['id'] ?>">Tampilkan lebih banyak</a>
					
					<?php
						
					} else {
					
					?>
						
					<a onclick="alert('Anda perlu menjadi member dan berlangganan paket e-book kami untuk melihat konten ini')" href="registration.php">Tampilkan lebih banyak</a>
						
					<?php

					}
					
					?>

					</div>
				</div>

		<?php
		
		}

		?>	

			</div>

		<?php

		}
			
		?>
		
	</main>
	<!-- End main -->	
	<div class="right">

		<?php 

		$statement = "SELECT * FROM site_wod WHERE status = 'Active' AND word_range = 'all' ORDER BY word_id DESC";
		$execute_query = $db->query($statement);
		$word_of_the_day_data = $execute_query->fetch_assoc();
		if (!empty($word_of_the_day_data)) {

		?>

			<div class="member_word_of_the_day" id="Word">
				<h6>Word of the Day </h6>
				<div class="word">

				<?php 
					
				echo $word_of_the_day_data["word"];
				
				?>

			</div>
			<div class="word_content">

				<?php 
					
				echo $word_of_the_day_data["content"];
				echo $word_of_the_day_data["content_extend"];
				 
				?>

			</div>

		<?php
		
		}

		?>

		<br>
		<br>
	</div>
	</div>
	</div>
</div>
<!-- End .container .logintrue-panel -->

<div class="point_overlay">
	<a href="#Book">Ebook</a>
	<a href="#Lesson">Lesson of The Day</a>
	<a href="#Word">Word of The Day</a>
</div>

<?php 

// Js
include 'js.php'; 

?>

</body>
</html>