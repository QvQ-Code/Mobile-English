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
	<div class="sentence-list">
		<h4>Sentence bank</h4>

		<form action="" method="POST">
		<div class="form-group" style="flex-direction: row">
			<input type="text" name="key-search" placeholder="Type here..." required>
			<input type="submit" name="key-go" value="Search">
		</div>
		</form>
	</div>
</div>
</body>
</html>