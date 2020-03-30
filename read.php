<?php 

session_start();

ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require_once("classes/gate.php");
require_once('config/database.php');

if(!$isLoggedIn) {
    header("Location: index.php");
    exit();
}

// Referensi buku
$book_id = $_GET['book_ref'];
$chap_ref = $_GET['chap_ref'];

?>
<!DOCTYPE html>
<html lang="en">
<?php 
	include_once 'head.php';
?>
<body>
<div class="read-container">

<div class="blank_space"></div>

<div class="content-wrapper" id="back_to_top">

	<button class="left_nav_button" id="left_nav_button" onclick="left_nav_open()">
		Table of Contents
	</button>

	<div class="left-side" id="left_nav_overlay">
		<button class="left_nav_button" id="left_nav_button_close" onclick="left_nav_close()">
			Close
		</button>
		<div class="book-cover">
			<?php 
				$book_cover = "SELECT cover_img FROM book WHERE book_id = $book_id";
				$get = $db->query($book_cover);
				$cover = $get->fetch_assoc();
			?>
			<img src="assets/uploads/<?php echo $cover['cover_img'];?>">
		</div>
		<!-- End .book-cover -->

		<div class="chapter-list">
			<?php 

				$chapter_data = "
					SELECT DISTINCT chapter, heading FROM book_chapter 
					WHERE book_id= $book_id 
					ORDER BY cast(chapter as int) ASC";

				$query2 = $db->query($chapter_data);
				$a = 1;

			?>

				<table id="table_id" class="display" style="background-color: white; padding: 20px 0; border-bottom: 20px solid white;">
					<h5 class="table_of_content">Table of Contents</h5>
				    <thead>
				        <tr>
				        	<th>#</th>
				            <th>Chapter List</th>
				        </tr>
				    </thead>
				    <tbody style="padding-bottom: 20px;">
				    <?php while ($row = $query2->fetch_assoc()) { ?>
				        <tr>
				        <td><?php echo $a++;?></td>
				        <td>
				        	<a href="read.php?book_ref=<?php echo $book_id;?>&chap_ref=<?php echo $row['chapter'];?>">
								<?php echo $row['heading'];?>
							</a>    	
				        </td>
				        </tr>
				    <?php } ?>
				    </tbody>

				</table>

				<script type="text/javascript">
					$(document).ready( function () {
					    $('#table_id').DataTable({
					    	paging: false,
					    	searching: true,
    						ordering:  false 
					    });
					} );
				</script>

		</div>
		<!-- End .chapter-list -->
	</div>
	<!-- End .left-side -->

	<div class="right-side">
		<?php

			$sql = "
				SELECT book.book_id, book_chapter.* 
				FROM book 
				INNER JOIN book_chapter 
				ON book.book_id = book_chapter.book_id 
				WHERE book.book_id=$book_id 
				AND book_chapter.chapter=$chap_ref ORDER BY page ASC";

			$another = $db->query($sql);
			$data_object = $another->fetch_assoc();
			
			$n = (int)$chap_ref+1;
			$p = (int)$chap_ref-1;

		?>

		<!-- div class="next-btn prev-btn">
			<?php if($chap_ref !== '1' && $data_object !== NULL) { ?>
				<a style="float: left;" href="read.php?book_ref=<?php echo $data_object["book_id"];?>&chap_ref=<?php echo $p;?>">Prev Chapter</a>
			<?php } ?>

			<?php if ($data_object !== NULL) { ?>
				<a style="float: right" href="read.php?book_ref=<?php echo $data_object["book_id"];?>&chap_ref=<?php echo $n;?>">Next Chapter</a>
			<?php } ?>				
		</div -->
		<!-- End .next-btn prev-btn-->

		<div id="book_chapter">
			<a>Chapters &#9661;</a>
			<div class="chapter_list">
				
			</div>
			<div>
				<?php 
					$book_name_data = $db->query("SELECT name FROM book WHERE book_id = $book_id");
					$book_name = $book_name_data->fetch_assoc();
					echo $book_name["name"];
				?>		
			</div>
		</div>
		
		<div class="title"><?php echo $data_object["heading"]; ?></div>
		<!-- End .title -->

		<?php 
		$sql = "
				SELECT book.book_id, book_chapter.* 
				FROM book 
				INNER JOIN book_chapter 
				ON book.book_id = book_chapter.book_id 
				WHERE book.book_id=$book_id 
				AND book_chapter.chapter=$chap_ref ORDER BY page ASC";

		$query3 = $db->query($sql);

		while ($row = $query3->fetch_assoc()) {
		?>
			<div  class="ck-content" onmousedown="return false">
				<?php 
					if ($row !== NULL) {
						echo $row['content']; 
					} else {
						include_once "readEnd.php";
					}
				?>
				<div class="page_ident">
					<p><?php echo $row["heading"] . " "; ?> </p>
					<strong>&bull; <?php echo $row["page"]; ?></strong>
				</div>
			</div>
		<?php			
		}
		?>

		<!-- End .content -->
	</div>
	<!-- End .right-side -->

	<div style="display: none;" id="BackToTop">
		<a href="#Header">
			<svg style="width:24px;height:24px" viewBox="0 0 24 24">
			    <path fill="currentColor" d="M13,18V10L16.5,13.5L17.92,12.08L12,6.16L6.08,12.08L7.5,13.5L11,10V18H13M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2Z" />
			</svg>
		</a>		
	</div>

</div>
<!-- End content-wrapper -->

</div>	
<!-- End .read-container -->

<script type="text/javascript">
		function left_nav_open(){
			document.getElementById("left_nav_button").style.display = "none";
			document.getElementById("left_nav_button_close").style.display = "block";
			document.getElementById("left_nav_overlay").style.display = "block";
		}
		function left_nav_close(){
			document.getElementById("left_nav_button").style.display = "block";
			document.getElementById("left_nav_button_close").style.display = "none";
			document.getElementById("left_nav_overlay").style.display = "none";
		}
	</script>

<?php include 'js.php'; ?>
</body>
</html>