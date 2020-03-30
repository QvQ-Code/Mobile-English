<?php 
	$lead = $site->site_lead();
	$footer_article = $site->site_article(3);
?>

<footer class="footer-wrapper">
	<div>
		<h5><?php echo $lead["title"]; ?></h5>
		<div class="content lead">
			<?php echo $lead["content"]; ?>
		</div>
	</div>
	<div>
		<h5>Last News</h5>
		<div class="content article">
		<?php while ($article = $footer_article->fetch_assoc()) { ?>

			<?php 
				$timestamp = strtotime($article["date"]);
				$date = date('d-m-Y', $timestamp);
			?> 

			<a href="post.php?ref=<?php echo $article["article_id"]; ?>">
				<?php echo $article["title"]; ?>
			</a>
			<div class="date"><?php echo $date; ?></div>

		<?php } ?>
		</div>
	</div>
	<div class="meta">
		<h5>Get in touch</h5>
		<div class="item">
			<i style="color: red;" class="material-icons">
			room
			</i>
			<div>
				Jl. Palem Kuning, Citra Garden 3, D1/21, Jakarta Barat, Indonesia.
			</div>
		</div>

		<div class="item">
			<i style="color: deepskyblue;" class="material-icons">
			email
			</i>
			<div>
				eplus_99@yahoo.co.id
			</div>
		</div>

		<div class="item">
			<i style="color: lime" class="material-icons">
			phone
			</i>
			<div>
				(021) 541 2519 , (021) 540 9802 
			</div>
		</div>
	</div>

	<div id="BackTotop" class="back-to-top">
		<a href="#Header">
			<i class="material-icons">
			arrow_upward
			</i>
			<div style="width: 100%">To top</div>
		</a>
	</div>
</footer>
<div class="copyright">
	&copy;	<?php echo date("Y");?> Mobile English, All right reserved.
</div>