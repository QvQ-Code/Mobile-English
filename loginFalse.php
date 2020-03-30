<?php

require 'classes/book.php';
require 'classes/site.php';
require 'config/database.php';

$book = new Book();
$site = new Site();

// Ambil data buku max 3
$sql = "SELECT * FROM book ORDER BY book_id ASC LIMIT 3";
$book_data = $db->query($sql);

// Ambil data article max 5
$sql = "SELECT * FROM site_article ORDER BY article_id DESC LIMIT 5";
$article_data = $db->query($sql);

// WOD data
$word_sql = "SELECT * FROM site_wod WHERE status = 'Active' AND word_range = 'all' ORDER BY word_id DESC";
$word_data = $db->query($word_sql);
$word = $word_data->fetch_object();

// LESSON data
$lesson_sql = "SELECT * FROM site_lesson WHERE status = 'Active' ORDER BY id DESC";
$lesson_data = $db->query($lesson_sql);
$lesson = $lesson_data->fetch_object();

?>
<!DOCTYPE html>
<html>
<?php 
	include 'head.php'; 
?>
<body>
<div class="Container">

<!-- Banner + Header -->
<div id="Banner" class="banner"></div>
<!-- End Banner + Header -->

<!-- Main content dll -->
<main id="Main">

	<?php 
		include 'header.php'; 
	?>

	<div id="Bannertext">
		<h3>Mobile English</h3>
	</div>

	<div id="mainWrapper">
	<div class="content-box">
		<h5>Our Book Collection</h5>

		<div class="flex-box">
		<?php 
			while ($book = $book_data->fetch_assoc()) {
		?>
			<div class="item-wrapper">
				<div class="item">	
					<img src="assets/uploads/<?php echo $book["cover_img"]; ?>">
				</div>
				<div class="caption">
					<?php echo $book["name"]; ?>
				</div>
			</div>
		<?php
			}
		?>
		</div>

		<div style="display: none;" class="link">
			<a class="view_link" href="#"><strong>View all</strong></a>	
		</div>
	</div>
	<!-- End .content-box -->

	<div class="content-box desc-pad">
		<h5>English Lessons</h5>

		<div class="lesson_wrapper">
            <div class="item">
            	<h5 style="padding: 0;">Word of the day</h5>
            	<div class="word">
            		
            	<?php 

            		echo '"' . $word->word . '"';

            	?>

            	</div>
            	<a href="word_of_the_day.php?mas=no">
            		<button>
            			View 
	            		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
	                        <path fill="currentColor" d="M4,15V9H12V4.16L19.84,12L12,19.84V15H4Z" />
	                    </svg>
	            	</button>
            	</a>
            </div>
            <div class="item">
            	<h5 style="padding: 0;">Lesson of the day</h5>
            	<div class="lesson">
            		
            	<?php 

            	echo $lesson->title;	

            	?>

            	</div>
            	<a href="lesson_of_the_day.php?lesson_id=<?php echo $lesson->id ?>">
            		<button>
            			View 
	            		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
	                        <path fill="currentColor" d="M4,15V9H12V4.16L19.84,12L12,19.84V15H4Z" />
	                    </svg>
	            	</button>
            	</a>
            </div> 

           	<div id="break"></div>

        </div>
        <!-- END Lesson Container -->
	</div>
	<!-- End .content-box -->

	<div class="content-box">
		<div class="blog">
			<div id="title">
				<div><h5>News </h5></div>
				<i class="material-icons">arrow_downward</i>
			</div>
			<div class="blog-list">
			<?php 
			while ($article = $article_data->fetch_assoc()) {
			?>
				<div class="list-item">
					<div class="img">
						<img src="assets/uploads_article/<?php echo $article["banner"];?>">
					</div>
					<div class="desc">
						<a href="post.php?ref=<?php echo $article["article_id"]; ?>">
						<?php 
							echo substr($article["title"], 0, 50);
						?>..
						</a>
						<div>
						<?php 
							echo substr($article["content"], 0, 120);
						?>..
						</div>
					</div>
				</div>
			<?php
			}
			?>
			</div>
		</div>
		<div class="free-trial">
			<div id="title">
				<div><h5>Try it for free </h5></div>
				<i class="material-icons">arrow_downward</i>
			</div>
			<p>
				Feel free to try our e-books. Register now and read them for 7 days.
			</p>
			<a class="sign-up" href="registration.php?trial=1">
				Sign up
			</a>
		</div>
	</div>
	</div>
	
	<?php include 'footer.php'; ?>
</main>
<!-- End Main content dll -->

</div>
<!-- End .container -->
</body>
</html>