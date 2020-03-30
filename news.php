<?php 
	session_start();
	
	require 'classes/site.php';
	$site = new Site();
?>

<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div class="news-container">
	<?php include 'header.php'; ?>

	<div class="news-wrapper">
		<div class="field">
			<section>
				<h6>Look at this</h6>
				<div class="news-box">
					<?php 
						$sql = "SELECT * FROM site_article ORDER BY article_id DESC LIMIT 1";
						$data = $site->execute($sql);
						$article = $data->fetch_assoc();
					?>
					<img src="assets/uploads_article/<?php echo $article["banner"]; ?>">
					<div class="link">
						<a href="post.php?ref=<?php echo $article["article_id"];?>"><?php echo $article["title"]; ?></a>
					</div>
				</div>
			</section>

			<section class="lastest-news">
				<h6>Lastest News</h6>
				<?php 
					$sql = "SELECT * FROM site_article ORDER BY article_id LIMIT 7";
					$data = $site->execute($sql);
					while ($article = $data->fetch_assoc()) {
				?>
				<div class="news-box">
					<img src="assets/uploads_article/<?php echo $article["banner"]; ?>">
					<div class="link">
						<a href="post.php?ref=<?php echo $article["article_id"];?>"><?php echo $article["title"]; ?></a>
					</div>
				</div>
				<?php
					}
				?>
			</section>
		</div>

		<div class="field">
			<section class="popular-news">
				<h6>Most Popular</h6>
				<?php 
					$count = 10;
					$data = $site->site_article($count);
					while ($article = $data->fetch_assoc()) {
				?>
				<div class="news-box">
					<div class="img">
						<img src="assets/uploads_article/<?php echo $article["banner"]; ?>">
					</div>
					<div class="info">
						<div class="tag">Tag</div>
						<div class="title">
							<a href="post.php?ref=<?php echo $article["article_id"];?>"><?php echo substr($article["title"], 0, 50); ?> . .</a>
						</div>
					</div>
				</div>	
				<?php
					}
				?>
			</section>
		</div>
	</div>
	<!-- .news-wrapper -->

	<?php include 'footer.php'; ?>
</div>
</body>
</html>