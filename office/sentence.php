<?php 
	session_start();

	if (isset($_POST["add-sentence"])) {
		$keyword = $_POST["keyword"];
		$sentence = serialize($_POST["sentence"]);
		$data = unserialize($sentence);

		require 'config/database.php';

		foreach (array_filter($data[0]) as $key => $value) {
			$execute = $db->query("INSERT INTO `site_sentence` (`sentence_id`, `sentence`, `keyword`) VALUES (NULL, '$value', '$keyword')");
		}

		if ($execute) {
			unset($_POST);
			header("location: sentence.php");
			exit();
		} else {
		?>

		<script type="text/javascript">
			alert("Fail to add data");
		</script>

		<?php
		}
	}
?>
<!DOCTYPE html>
<html>
<?php 
	include 'head.php';
?>
<body>

<div class="container">
<?php 
	include 'sidebar.php';
?>
<div class="main-wrapper">
	<?php  
		include 'header.php';
	?>
	<div class="sentence">
	<form action="" method="POST">
		<h4>New Sentence</h4>
		<div class="form-group">
			<label>Keyword</label>
			<input type="text" name="keyword" placeholder="Type keyword here . ." required>
		</div>
		<div class="form-group">
			<label>1</label>
			<input type="text" name="sentence[0][]" placeholder="Type here . ." required>
		</div>
		<div class="form-group">
			<label>2</label>
			<input type="text" name="sentence[0][]" placeholder="Type here . .">
		</div>
		<div class="form-group">
			<label>3</label>
			<input type="text" name="sentence[0][]" placeholder="Type here . .">
		</div>
		<div class="form-group">
			<label>4</label>
			<input type="text" name="sentence[0][]" placeholder="Type here . .">
		</div>
		<div class="form-group">
			<label>5</label>
			<input type="text" name="sentence[0][]" placeholder="Type here . .">
		</div>
		<div class="form-group">
			<input type="submit" name="add-sentence" value="Submit">
		</div>
	</form>
	</div>
</div>
<!-- End main -->

</div>
<!-- End Container -->

</body>
</html>