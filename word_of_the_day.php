<?php 
	session_start();

	ini_set("display_errors", 1);
	error_reporting(E_ALL);

	require 'config/database.php';

	$statement = "SELECT * FROM site_wod WHERE status = 'Active' ORDER BY word_id DESC";
	$execute_query = $db->query($statement);
	$word_of_the_day_data = $execute_query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<?php 
	include 'head.php';
?>
<body>
<div class="word_of_the_day_container" style="overflow-x: hidden; padding-bottom: 50px; height: 100vh">
<?php 
	include 'header.php';
?>
	<div class="word_of_the_day_head">
	<h1>
			<strong>Word of The Day</strong>
	</h1>
	</div>
	<div class="word_of_the_day" id="wod">
		<div class="word">
			<?php echo $word_of_the_day_data["word"];?>
		</div>
		<div class="word_content">
			<?php echo $word_of_the_day_data["content"];?>
		</div>
		<?php
			if(!empty($word_of_the_day_data["content_extend"])){
		?>
				<button id="wod_more" onclick="this.style.display = 'none'">
					Tampilkan Lebih banyak
				</button>
				<div id="wod_extend">
				<div class="inner" id="wod_extend_inner">
					<?php echo $word_of_the_day_data["content_extend"];?>
				</div>
				</div>
		<?php
			}
		?>
	</div>
</div>
<script>
	var wod = document.getElementById("wod");
	var wod_more = document.getElementById("wod_more");
	var wod_extend = document.getElementById("wod_extend_inner");

	wod_more.addEventListener("click", function(){	
		wod_extend.style.height = "auto";
		wod_extend.style.padding = "40px 40px";
	});
</script>
</body>
</html>