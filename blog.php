<?php 
	ini_set("display_errors", 0);
	require 'classes/site.php';
	$site = new Site();
?>
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div id="blog_container">

<div class="blog-header">
	<?php include 'header.php'; ?>
</div>
	
<section>
	<h5>Top Article</h5>
	<div class="wrapper">
		<?php 
		$sql = "SELECT * FROM site_article WHERE post = 1 AND draf = 0 ORDER BY views DESC LIMIT 2";
		$top = $site->execute($sql);
		while ($top_article = $top->fetch_assoc()) {
			$timestamp = strtotime($top_article["date"]);
			$date = date('M d, Y', $timestamp);
		?>

		<div class="item">
			<div class="banner">
				<?php 
				if (!empty($top_article["banner"])) {
				?>
					<img src="assets/uploads_article/<?php echo $top_article["banner"];?>">
				<?php
				}
				?>
			</div>
			<a class="title" href="post.php?ref=<?php echo $top_article["article_id"]; ?>">
				<?php echo substr($top_article["title"], 0, 30); ?>..
			</a>
			<div class="author">
				<i style="color: green"><?php echo $top_article["author"];?></i> . <?php echo $date;?>
			</div>
		</div>

		<?php
		}
		?>
	</div>
</section>
<section>
	<h5>Today's English</h5>
	<div class="wrapper">
		<?php 
		$sql = "SELECT * FROM site_article WHERE post = 1 AND draf = 0 ORDER BY article_id DESC LIMIT 4";
		$english = $site->execute($sql);

		while ($english_article = $english->fetch_assoc()) {
			$timestamp = strtotime($english_article["date"]);
			$date = date('M d, Y', $timestamp);
		?>

		<div class="item">
			<div class="banner">
				<?php 
				if (!empty($english_article["banner"])) {
				?>
					<img src="assets/uploads_article/<?php echo $english_article["banner"];?>">
				<?php
				}
				?>
			</div>
			<a class="title" href="post.php?ref=<?php echo $english_article["article_id"]; ?>">
				<?php echo substr($english_article["title"], 0, 30); ?>..
			</a>
			<div class="author">
				<i style="color: green"><?php echo $english_article["author"];?></i> . <?php echo $date;?>
			</div>
		</div>

		<?php
		}
		?>
	</div>
</section>

<?php include 'footer.php'; ?>
</div>
</body>
</html>