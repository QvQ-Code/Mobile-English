<?php
	
	require "classes/site.php";
    require "classes/UserClass.php";
    require "config/database.php";
	
	$site = new Site();

	$uid = $_SESSION["user_id"];

	// User data
	$user_sql = "SELECT * FROM users WHERE user_id = $uid";
	$user_data = $db->query($user_sql);
	$user = $user_data->fetch_object();

	// News data
	$article_sql = "SELECT * FROM `site_article` WHERE `date` = CURRENT_DATE";
	$article_data = $db->query($article_sql);
	$article_count = mysqli_num_rows($article_data);
	$article = $article_data->fetch_object();

	// User order data
	$order_sql = "SELECT * FROM `users_order` WHERE `user_id` = $uid";
	$order_data = $db->query($order_sql);
	$order_count = mysqli_num_rows($order_data);
	$order = $order_data->fetch_object();

	// Book Data
	$book_sql = "SELECT users_book_catalog.*, book.* FROM users_book_catalog INNER JOIN book ON users_book_catalog.book_id = book.book_id WHERE user_id = $uid";
	$book_data = $db->query($book_sql);

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
<html lang="en">

<?php
    include "head.php";
?>

<body style="background-color: #F0F2F7;">

<div id="Header" class="blank_space"></div>

<div class="login_true_page">

    <div class="main_container">
       <h5>HOME</h5>

       <div class="profile_go">
            <a href="profile.php">
            <div class="img_back">
                <img src="assets/profile_img/Lu-BGreenhorn.png" alt="Img">
            </div>	
            </a>
            <div class="name_email">
                <span>
				<a href="profile.php">
				
				<?php echo $user->firstname . " " . $user->lastname; ?> 

				</a>
				</span>
                <span>
				
				<?php echo strstr($user->email,'@',true); ?> 

				</span>
            </div>
       </div>
       <!-- END profile_img -->

       <nav>
			<a href="news.php">
			<span>
				
				<!-- Vector icon -->
				<svg style="width:24px;height:24px" viewBox="0 0 24 24">
				    <path fill="currentColor" d="M2 4V18C2 18 2 20 4 20H20C20 20 22 20 22 18V4H2M9 13H5V7H9V13M19 13H11V11H19V13M19 9H11V7H19V9Z" />
				</svg>

			</span>
			<span>
				<p>News</p>
				<p>

				<?php echo $article_count; ?>

				 News today
				</p>
			</span>
			<span>
				
			</span>
			</a>       		

			<a href="orders.php">
			<span>
				
				<!-- Vector icon -->
				<svg style="width:24px;height:24px" viewBox="0 0 24 24">
				    <path fill="currentColor" d="M3,2H6V5H3V2M6,7H9V10H6V7M8,2H11V5H8V2M17,11L12,6H15V2H19V6H22L17,11M7.5,22C6.72,22 6.04,21.55 5.71,20.9V20.9L3.1,13.44L3,13A1,1 0 0,1 4,12H20A1,1 0 0,1 21,13L20.96,13.29L18.29,20.9C17.96,21.55 17.28,22 16.5,22H7.5M7.61,20H16.39L18.57,14H5.42L7.61,20Z" />
				</svg>

			</span>
			<span>
				<p>Orders</p>
				<p>  
				
				<?php echo $order_count; ?>
				
				On-hold orders
				</p>
			</span>
			</a>       		

			<a href="about.php">
			<span>
					
				<!-- Vector icon -->	
				<svg style="width:24px;height:24px" viewBox="0 0 24 24">
				    <path fill="currentColor" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
				</svg>

			</span>
			<span>
				<p>About</p>
			</span>
			</a>       		

			<a href="logout.php">
			<span>
				
				<!-- Vector icon -->	
				<svg style="width:24px;height:24px" viewBox="0 0 24 24">
	                <path fill="currentColor" d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1 21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19Z" />
	            </svg>

			</span>
			<span>
				<p>Logout</p>
			</span>
			</a>       		
       </nav>

       	<div class="external_link">	
       		<h5>Useful Links</h5>
       		<ul>
			   <abbr title="Robby Lou's Learners English-Indonesian Dictionary | The Dictionary that teaches grammar"><a href="http://www.robbylou.com/home" target="blank"><li>robbylou.com</li></a></abbr>
       		</ul>
       	</div>

    </div>
    <div class="main_container">

    	<div class="mobile_style">
    		<?php include 'header.php'; ?>

	       <div class="profile_go">
	            <a href="profile.php">
	            <div class="img_back">
	                <img src="assets/profile_img/Lu-BGreenhorn.png" alt="Img">
	            </div>	
	            </a>
	            <div class="name_email">
	                <span>
					<a href="profile.php">
					
					<?php echo $user->firstname . " " . $user->lastname; ?> 

					</a>
					</span>
	                <span>
					
					<?php echo strstr($user->email,'@',true); ?> 

					</span>
	            </div>
	       </div>
	       <!-- END profile_img -->
    	</div>
    	<!-- END Mobile Style -->

        <div class="lesson_wrapper">
            <div class="item">
            	<h5>Word of the day</h5>
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
            	<h5>Lesson of the day</h5>
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

           	<?php 

           	// Select user book data
			$uid = $_SESSION['user_id'];
			$book_count = $db->query("SELECT book_id FROM users_book_catalog WHERE user_id = $uid");
			$row = mysqli_num_rows($book_count);
			if($row > 0){

			?>

           	<div class="item">
            	<h5>Sentence bank</h5>
            	<div class="lesson">
            		
            	Looking for sentence example?

            	</div>

            	<a href="lesson_of_the_day_extend.php?lesson_id=<?php echo $lesson->id ?>">
            		<button>
            			Go 
	            		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
	                        <path fill="currentColor" d="M4,15V9H12V4.16L19.84,12L12,19.84V15H4Z" />
	                    </svg>
	            	</button>
            	</a>
            </div> 
            <?php

        	}

           	?>

           	<div id="break"></div>

        </div>
        <!-- END Lesson Container -->

<?php 
	
	// Select user book data
	$book_count = $db->query("SELECT book_id FROM users_book_catalog WHERE user_id = $uid");
	$row = mysqli_num_rows($book_count);
	if($row == 0){	

	?>

		<div class="book-collection">
			<a class="btn btn-primary" href="addBook.php">+ ADD e-book</a><br>
		</div>	
	
	<?php
	} 
	?>

        <div class="book_list">

<?php 

	// Trial
	$user = new User();
	if ($user->Trial() == true): 

	$trial_sql = "SELECT * FROM book_trial";
	$trial_data = $db->query($trial_sql);
	$trial = $trial_data->fetch_assoc();
	$trial_book = (int) $trial["book_id"];

	$book_trial_sql = "SELECT book.*, book_chapter.* FROM book INNER JOIN book_chapter ON book.book_id = book_chapter.book_id WHERE book.book_id = $trial_book";
	$book_trial_data = $db->query($book_trial_sql);
	$book_trial_chapters = mysqli_num_rows($book_trial_data);
	$book_trial = $book_trial_data->fetch_assoc();
	$num = 1;
	
	$book_trial_timestamp = $trial["timestamp"];
	$book_trial_exp = date("Y-m-d", strtotime(date("Y-m-d", strtotime($book_trial_timestamp)). " + 7 day"));

?>

		<h5>Trial Book</h5>
        <div class="sep"></div>

		<a href="read.php?book_ref=<?php echo $book_trial['book_id'];?>&chap_ref=<?php echo $book_trial['chapter']; ?>">
            <span>

			<?php 		

				echo $num++;

			?>

            </span>
            <span>

			<?php 

				echo $book_trial["name"];

			?>

            </span>
            <span>

			<?php 
			
				echo $book_trial_chapters . " Chapters"; 

			?>

            </span>
            <span>

			<?php 

				echo "expired on " . date("d-m-Y", strtotime($book_trial_exp));

			?>

            </span>
        </a><br>

<?php 
			
	endif;
	// Trial END

	$abc = $db->query("SELECT * FROM users_book_catalog WHERE user_id = $uid");
	$def = mysqli_num_rows($abc);
	if ($def > 0) {

?>

            <h5>Book List</h5>
            <div class="sep"></div>

<?php

	}

	$num = 1;

	while ($book = $book_data->fetch_assoc()) {
		$book_timestamp = 	$book["timestamp"];
		$book_exp = date("Y-m-d", strtotime(date("Y-m-d", strtotime($book_timestamp)). " + 360 day"));
		$book_id = $book['book_id'];

		// Chapter data
		$chapter_sql = "SELECT book.*, book_chapter.* FROM book INNER JOIN book_chapter ON book.book_id = book_chapter.book_id WHERE book.book_id =".$book_id;
		$chapter_data = $db->query($chapter_sql);
		$chapter_count = mysqli_num_rows($chapter_data);
		$chapter = $chapter_data->fetch_assoc();
		
		if(date("Y-m-d") < $book_exp){
?>
		
		<a href="read.php?book_ref=<?php echo $book['book_id'];?>&chap_ref=<?php echo $chapter['chapter']; ?>">
            <span>

			<?php 		

				echo $num++ . ".";

			?>

            </span>
            <span>

			<?php 

				echo $book["name"];

			?>

            </span>
            <span>

			<?php 
			
				echo $chapter_count . " Chapters"; 

			?>

            </span>
            <span>

			<?php 

				echo "expired on " . date("y-m-d", strtotime($book_exp));

			?>

            </span>
        </a>

<?php
		}

	}

?>
            
        </div>
        <!-- END Book List -->

    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>