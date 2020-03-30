<?php 
	session_start();

	require "controller/auth.php";
	require "controller/site.php";
	$auth = new Auth();
	$site = new Site();

	// Slideshow Delete img
	if (isset($_GET["img_ref"])) {
	  $id_slider = $_GET["img_ref"];
	  $img_path = "assets/uploadsSlideshow/" . $_GET["img_name"];
	  $img_path_client = "../assets/uploadsSlideshow/" . $_GET["img_name"];

	  require("config/database.php");
	  $sql = "DELETE FROM `site_slider` WHERE `site_slider`.`id_slider` = $id_slider";
	  $execute = $db->query($sql);
	  if ($execute) {
	    unlink($img_path);
	    unlink($img_path_client);
	    header("location: site.php");
	    exit();
	  }
	}
?>

<!DOCTYPE html>
<html>
<?php 
	// Including HTML Head Elements
	include 'head.php'; 
?>
<body>
<div class="container">
<?php 
	// Include sidebar, main and footer Elements, js: "Hey! how about me?".
	include 'sidebar.php';
?>
<div class="main-wrapper">
	<?php include 'header.php'; ?>

	<div class="site">
		<nav class="nav">
			<ul>
				<li><a href="#Slideshow">Slideshow</a></li>
				<li><a href="#Lead">Lead</a></li>
				<li><a href="#About-us">About</a></li>
			</ul>
		</nav>	

		<div class="site-wrapper">
			<div id="Slideshow" class="slideshow">
				<h4>Slideshow</h4>
				
				<label>Current slide image</label>

				<div class="current-img">

					<?php 
						$execute = $auth->executeNotRow("SELECT * FROM site_slider"); 
						while ( $data = $execute->fetch_assoc() ) {
					?>

		  			<div class="img">
		  				<img src="assets/uploadsSlideshow/<?php echo $data["img"];?>">
			           	<a href="site.php?img_ref=<?php echo $data["id_slider"];?>&img_name=<?php echo $data["img"];?>" onclick="return confirm('Hapus gambar?');">Delete</a>
			  		</div>

			  		<?php
			  			}
			  		?>
			  	</div>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group btn-primary" style="border-radius: 3px;">
		  				<?php 
		  					if (!empty($_SESSION["upload-message"])) {
		  						echo $_SESSION["upload-message"];
		  						unset($_SESSION["upload-message"]);
		  					}
		  				?>
		  			</div>
					<div class="form-group">
						<label>Tambah Gambar</label>
						<input type="file" name="slideimage">
					</div>
					<div class="form-group">
		  				<label>Caption</label>
		  				<input class="form-control" type="text" name="slidecaption" placeholder="Enter image description" required>
		  			</div>
					<div>
						<input type="submit" name="slides-add" value="Simpan">
					</div>
				</form>
			</div>
			<!-- End slideshow -->

			<div id="Lead" class="lead">
				<h4>Lead</h4>

				<?php 
					$execute = $auth->executeNotRow("SELECT * FROM site_lead"); 
					$data = $execute->fetch_assoc();
				?>

				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
			          <input type="hidden" name="id_lead" value="<?php echo $row["id_lead"]; ?>">
			        </div>
			        <div class="form-group">
			          <label>Title</label>
			          <input class="form-control" type="text" name="title" value="<?php echo $data["title"]; ?>" required>
			        </div>
			        <div class="form-group">
			          <label>Lead Content</label>
			          <div style="height: 10px;"></div>
			          <textarea name="editor_content" id="myEditor" required>
			            <?php echo $data["content"]; ?>
			          </textarea>
			          <script>CKEDITOR.replace( 'editor_content' );</script>
			        </div>
			        <div class="form-group">
			          <input type="submit" name="lead-add" value="Save">
			        </div>
				</form>
			</div>
			<!-- End Lead -->

			<div id="About-us" class="about">

				<?php 
					$execute = $auth->executeNotRow("SELECT * FROM site_info");
					$data = $execute->fetch_assoc();
				?>

				<h4>About Us</h4>
				<form action="" method="POST">
					<div class="form-group">
			          <label>About Us</label>
			          <div style="height: 10px;"></div>
			          <textarea name="about_content" id="myEditor" required>
			            <?php echo $data["about"]; ?>
			          </textarea>
			          <script>CKEDITOR.replace( 'about_content' );</script>
			        </div>
			        <div class="form-group">
			        	<input type="submit" name="about-add" value="Simpan">
			        </div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	include 'js.php';
?>
</body>
</html>