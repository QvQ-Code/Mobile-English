<?php 
	session_start();

	require 'config/database.php';

	$lesson_id = $_GET["lesson_id"];

	$statement = "SELECT * FROM site_lesson WHERE id = $lesson_id";
	$execute_query = $db->query($statement);
	$lesson_of_the_day_data = $execute_query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<?php 
	include 'head.php';
?>
<body>
<div class="Container">
<?php 
	include 'header.php';
?>
		<div class="lesson_of_the_day">
				<h5>Lesson of the Day</h5><br>

				<div class="lesson-list">
					<h6>
						<?php echo $lesson_of_the_day_data["title"];?>
					</h6>
					<?php if (!empty($lesson_of_the_day_data["extend"])): ?>
					<div class="content">
						<?php 
							echo $lesson_of_the_day_data['extend']; 
						?>
					</div>
					<?php endif ?>
				</div>
			</div>

</div>
</body>
</html>