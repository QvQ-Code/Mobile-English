<?php 
session_start();

if (isset($_POST["wod_save"])) {
	$word = trim($_POST["word"]);
	$status = $_POST["status"];
	$range = $_POST["range"];
	$content = $_POST["WoD_content"];

	require "config/database.php";
	$check = "SELECT * FROM site_wod WHERE word =$word";
	$test = $db->query($check);
	if ($test) {
		$wod = $test->fetch_assoc();
		if($word == $wod["word"]);

		$_SESSION["wod"] = $word . " " . "already exists!";
		unset($_POST);
		header("location: word_of_the_day.php");
		exit();
	}

	$sql = "INSERT INTO `site_wod` (`word_id`, `word`, `status`, `word_range`, `content`, `date`) VALUES (NULL, '$word', '$status', '$range', '$content', CURRENT_DATE)";
	$set = $db->query($sql);
	if ($set) {
		$_SESSION["wod"] = $word . " " . "has been added.";
		unset($_POST);
		header("location: word_of_the_day.php");
		exit();
	} else {
		$_SESSION["wod"] = "Fail to add a word.";
	}
}

if (!isset($_GET["edit_id"])) {
	header("location: word_table.php");
	exit();
} else {
	$id = $_GET["edit_id"];

	require 'config/database.php';
	$sql = "SELECT * FROM site_wod WHERE word_id = $id";
	$execute = $db->query($sql);
	$word = $execute->fetch_object();
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
			Word of The day
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
				<label>Word</label>
				<input type="text" name="word" placeholder="Enter word here" value="<?php echo $word->word; ?>" required>
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
					<?php echo $word->word; ?>
				</textarea>
			    <script>
			    	CKEDITOR.replace( 'WoD_content' );
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