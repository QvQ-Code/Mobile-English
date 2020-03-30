<?php 
	session_start();

	require 'config/database.php';
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
				<h5 style="background-image: none; color: red; font-weight: bold; padding-left: 0;">Lesson of the Day</h5>
				<br>
		<?php 
				$statement = "SELECT * FROM site_lesson WHERE status = 'Active' ORDER BY id DESC";
				$execute_query = $db->query($statement);
				while ($lesson_of_the_day_data = $execute_query->fetch_assoc()) {
		?>
				<div class="lesson-list">
					<h6 style="background-color: blue; font-family: 'Garamond';"><?php echo $lesson_of_the_day_data["title"];?></h6>
					<div class="content">
						<?php echo $lesson_of_the_day_data['content']; ?>
					</div>
					
					<div style="margin-top: 10px;">
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

</div>
</body>
</html>