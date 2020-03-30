<?php 
	session_start();

	$ref = $_GET["ref"];

	require "config/database.php";
    $sql = "SELECT * FROM site_article WHERE article_id = $ref";
    $execute = $db->query($sql);
    $article = $execute->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<?php include "head.php";?>
<body>

<div class="article-wrapper">
	<div class="arrow">
		<i class="material-icons">
		keyboard_backspace
		</i>
		 <a onclick="goBack()">BACK</a>

		 <script type="text/javascript">
		 	function goBack(){
		 		window.history.back();
		 	}
		 </script>
	</div>
	<div class="article-title">
		<?php echo $article["title"];?>
	</div>
	<div class="article-detail">
	<?php
		$name = $article["author"];
		$sql = "SELECT foto FROM `user_section_admin` WHERE admin_username = '$name'";
		$data = $db->query($sql);
		$fetch = $data->fetch_object();
	?>
		<div class="article-img-profile">
			<img src="assets/profile_img/<?php echo $fetch->foto; ?>." alt="img">
		</div>
		<div class="article-info">
			<div class="article-author">
				By <?php echo $article["author"];?>
			</div>
			<div class="article-date">
				On <?php echo $article["date"];?>
			</div>
		</div>	 
	</div>
	
	<?php 
	if (!empty($article["banner"])) {
	?>

	<div class="article_banner">
		<img src="assets/uploads_article/<?php echo $article["banner"]; ?>">
	</div>

	<?php
	}
	?>

	<div class="article-content ck-content" >
		<?php echo $article["content"];?>
	</div>
</div>

</body>
</html>