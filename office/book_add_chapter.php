<?php 

session_start();

require "controller/auth.php";
require "controller/book.php";

$auth = new Auth();
$book = new Book();

$book_id = $_GET["bid"];
$book_sql = "SELECT * FROM book WHERE book_id ='$book_id'";
$book_data = $auth->executeNotRow($book_sql);
$book = $book_data->fetch_assoc();

?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="add_chapter_wrapper">
			<form action="" method="POST">
				<div class="inner">
					<h4>Add Book Chapter</h4>	
					<h4></h4>
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $book["book_id"];?>">
					</div>
					<div class="form-group">
						<label>Nomor Chapter</label>
						<input type="text" name="nomor_chapter" required>
					</div>
					<div class="form-group">
						<label>Chapter Heading</label>
						<input type="text" name="judul" required>
					</div>
				</div>
				<div class="inner">
					<div id="pageForm" class="form-group">
						<textarea class="editor"  name="chapter_content[]"></textarea> 
					</div>
					<div class="from-group">
						<div id="addPage">Add page</div>
						<input id="submit_button" style="width: 100%;" type="submit" name="book_add_chapter" value="save">
					</div>
				</div>
			</form>	
		</div>

	</div>
</div>

<script> 

// Vars
var dd=1; 
var parent = document.getElementById("pageForm");
var trigger = document.getElementById("addPage");
var textarea = document.createElement("textarea");
var submitBtn = document.getElementById("submit_button");

// Additional
textarea.classList.add("editor");
textarea.name = "chapter_content[]";

// Add number for rach Editor id
$(".editor").each(function(){ 
	$(this).attr("id","editor"+dd); 
	CKEDITOR.replace( 'editor'+dd); 
	dd++; 
})

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
<?php include 'js.php'; ?>
</body>
</html>