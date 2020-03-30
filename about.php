<?php 
	session_start();
	require "classes/site.php";
	$site = new Site();
?>
<!DOCTYPE html>
<html lang="en">

	<?php include "head.php"; ?>
	
<body>

	<div id="About_header">
		<?php include "header.php"; ?>
	</div>

	<section class="container about-us">

	<div class="logo">
		<img src="assets/images/ALL.jpg">
	</div>

	<div class="about">
	<?php
	    require ("config/database.php");
	    $sql = "SELECT about FROM site_info";
	    $execute = $db->query($sql);
	    $row = $execute->fetch_assoc();
	    echo $row["about"];
	?>
	</div>
	</section>
	<!-- End #About_header -->

	<?php include "footer.php"; ?>

</body>
</html>