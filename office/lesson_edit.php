<?php 
session_start();
require 'config/database.php';

if (isset($_GET["edit_id"])) {
	$lesson_id = $_GET["edit_id"];

	$sql = "SELECT * FROM site_lesson WHERE id = $lesson_id";
	$execute_data = $db->query($sql);
	$lesson = $execute_data->fetch_object();
} else {
	header("location: lesson_table.php");
}

if (isset($_POST["wod_save"])) {
	$word = trim($_POST["word"]);
	$status = $_POST["status"];
	$range = $_POST["range"];
	$content = $_POST["WoD_content"];
	$extend = $_POST["WoD_content_extend"];

	require "config/database.php";
	$check = "SELECT * FROM site_lesson WHERE title =$word";
	$test = $db->query($check);
	if ($test) {
		$wod = $test->fetch_assoc();
		if($word == $wod["word"]);

		$_SESSION["wod"] = "Lesson already exists!";
		unset($_POST);
		header("location: lesson_of_the_day.php");
		exit();
	}

	$sql = "INSERT INTO `site_lesson` (`id`, `title`, `content`, `extend`, `status`, `lesson_range`, `date`) VALUES (NULL, '$word', '$content', '$extend', '$status', '$range', CURRENT_DATE)";
	$set = $db->query($sql);
	if ($set) {
		$_SESSION["wod"] = "Lesson has been added.";
		unset($_POST);
		header("location: word_of_the_day.php");
		exit();
	} else {
		$_SESSION["wod"] = "Fail to add a word.";
	}
}
?>
<!DOCTYPE html>
<html>
<?php 
	include "head.php"; 
?>
<body>

<div class="container">
	<?php 
		include 'sidebar.php'; 
	?>
	<main id="main" class="main-wrapper wod-main">	
		<?php 
			include 'header.php'; 
		?>
		<div class="WoD_editor">
		<form action="" method="post">

		<h4 style="width: 100%">
			Edit Lesson of The day
		</h4>
		<?php 
			if (isset($_SESSION["wod"])): 
		?>
		<div class="msg">
		<?php 
			echo $_SESSION["wod"]; 
			unset($_SESSION["wod"]);
		?>
		</div>
		<?php 
			endif 
		?>
		<div class="contain">
		<div class="wrapper">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="word" placeholder="Enter title here" value="<?php echo $lesson->title; ?>" required>
			</div>		
			<div class="form-group">
				<label>Active</label>
				<div class="radio">
					<div>
						<input type="radio" name="status" value="Active" checked> Yes	
					</div>
  					<div>
  						<input type="radio" name="status" value="Deactive"> No
  					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Range</label>
				<div class="radio">
					<div>
						<input type="radio" name="range" value="All" checked> All
					</div>
					<div>
						<input type="radio" name="range" value="Member"> Member
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="wod_save" value="save">
			</div>
		</div>

		<div class="wrapper">
			<div class="form-group">
				<label>Description</label>
				<textarea name="WoD_content">
				<?php echo $lesson->content; ?>	
				</textarea>
			    <script>
			    	CKEDITOR.replace( 'WoD_content' );
			    </script>
			</div>			
			<div class="form-group">
				<label>Extend</label>
				<textarea name="WoD_content_extend">
				<?php echo $lesson->extend; ?>	
				</textarea>
			    <script>
			    	CKEDITOR.replace( 'WoD_content_extend' );
			    </script>
			</div>			
		</div>	
		</div>
		</form>

		</div>
	</main>
	<!-- End #main -->
</div>
<!-- End Container -->
</body>
</html>