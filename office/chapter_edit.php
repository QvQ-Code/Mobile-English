 <?php 

	session_start();

	require 'controller/auth.php';
	require 'controller/book.php';

	$auth = new Auth();
	$book = new Book();

	$book_reference = $_GET["book_ref"];
	$chapter_reference = $_GET["ch_ref"];

	$chapter_sql = "SELECT * FROM book_chapter WHERE book_id = $book_reference AND chapter = $chapter_reference ORDER BY page ASC";
	$chapter_data = $auth->executeNotRow($chapter_sql);
	
	$chapter_object_sql = "SELECT * FROM book_chapter WHERE book_id = $book_reference AND chapter = $chapter_reference";
	$chapter_object_data = $auth->executeNotRow($chapter_object_sql);
	$chapter_object = $chapter_object_data->fetch_object();
	
?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container chapter-edit-container">

	<!-- Sidebar -->
	<?php include 'sidebar.php'; ?>

	<div class="main-wrapper">

		<!-- Header -->
		<?php include 'header.php'; ?>

		<div class="chapter-edit">
			<form action="" method="post">
				
				<div class="flex-box-row">
				<div class="flex-item">
				
				<h4>Chapter Edit</h4>
				<br>
				<div class="form-group">
					<label>No Chapter</label>
					<input class="chap_num" type="text" name="chapter_num" value="<?php echo $chapter_object->chapter;?>">
				</div>
				<div class="form-group">
					<label>Chapter Heading</label>
					<input type="text" name="chapter_heading" value="<?php echo $chapter_object->heading;?>">
				</div>

				</div>
				<div class="flex-item">
					
				<div id="pageForm" class="form-group">
					<label>Content</label>
				
				<?php 
				
				while ($chapter = $chapter_data->fetch_assoc()) {

				?>
					<input type="hidden" name="chapter_id[]" value="<?php echo $chapter["chapter_id"];?>">
					<input type="hidden" name="page[]" value="<?php echo $chapter["page"];?>">

					<textarea name="chapter_content[]" class="editor" required>
			        	<?php echo $chapter["content"];?>
			        </textarea>
				<?php

				}

				?>
				</div>
				
				<div class="form-group">
					<style type="text/css">
						#addPage {
							background-color: gold;
							color: white;
							height: 40px;
							line-height: 40px;
							border-radius: 3px;
							padding: 0 20px;
							margin-bottom: 20px;
						}
					</style>
					<div id="addPage">Add page</div>
					<input type="submit" name="chapter_edit" value="save">
				</div>

				</div>
				</div>
				<!-- End .form-group -->

			</form>
		</div>
		<!-- End .book-wrapper -->

	</div>
	<!-- .main-wrapper -->

</div>
<script type="text/javascript">
	var dd=1;
	var parent = document.getElementById("pageForm");
	var trigger = document.getElementById("addPage");
	var textarea = document.createElement("textarea");

	// Additional
	textarea.classList.add("editor");
	textarea.name = "add_chapter_content[]";

	$(".editor").each(function(){ 
		$(this).attr("id","editor"+dd); 
		CKEDITOR.replace( 'editor'+dd); 
		dd++; 
	});

 	// Adding new page field
	trigger.addEventListener("click", function(){
		parent.appendChild(textarea.cloneNode(true));
		$(".editor").each(function(){ 
			$(this).attr("id","editor"+dd); 
			CKEDITOR.replace( 'editor'+dd); 
			dd++; 
		})
	});
</script>
</body>
</html>