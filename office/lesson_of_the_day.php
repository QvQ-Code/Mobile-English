<?php 
session_start();

if (isset($_POST["lesson_save"])) {
	$lesson_title = $_POST["lesson_title"];
	$status	= $_POST["status"];
	$range = $_POST["range"];
	$lesson_content = $_POST["lesson_content"];
	$lesson_content_extend = $_POST["lesson_content_extend"];

	require 'config/database.php';

	$sql_check = "SELECT * FROM site_lesson WHERE title = $lesson_title";
	$check_data = $db->query($sql_check);
	
	if ($check_data) {
		$check = $check_data->fetch_assoc();
		if ($check["title"] == $lesson_title)
		$_SESSION["wod"] = "This lesson title is already exist";
		exit();
	}

	$sql_insert = "INSERT INTO `site_lesson` (`id`, `title`, `content`, `extend`, `status`, `lesson_range`, `date`) VALUES (NULL, '$lesson_title', '$lesson_content', '$lesson_content', '$status', '$range', CURRENT_DATE)";
	$insert_proccess = $db->query($sql_insert);
	
	if ($insert_proccess) {
		$_SESSION["wod"] = "Lesson has been added";
		header ("location: lesson_of_the_day.php");
		exit();
	} else {
		$_SESSION["wod"] = "Fail to add lesson";
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
			Lesson of The day
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
				<input type="text" name="lesson_title" placeholder="Enter title here" required>
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
				<input type="submit" name="lesson_save" value="save">
			</div>
		</div>

		<div class="wrapper">
			<div class="form-group">
				<label>Description</label>
				<textarea name="lesson_content">
					
				</textarea>
			    <script>
			    	CKEDITOR.replace( 'lesson_content' );
			    </script>
			</div>			
			<div class="form-group">
				<label>Extend</label>
				<textarea name="lesson_content_extend">
					
				</textarea>
			    <script>
			    	CKEDITOR.replace( 'lesson_content_extend' );
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