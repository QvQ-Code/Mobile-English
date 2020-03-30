<?php 
class Site {

	function __construct(){
		if (isset($_POST["slides-add"])) {
			$this->slideshowUpdate();
		}

		if (isset($_POST["lead-add"])) {
			$this->leadUpdate();
		}

		if (isset($_POST["about-add"])) {
			$this->aboutUpdate();
		}
	}

	function slideshowUpdate(){
		$target_dir = "assets/uploadsSlideshow/";
		$target_file = $target_dir . basename($_FILES["slideimage"]["name"]);
		$ready = 0;
		$image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Ni gambar asli?
		$check = getimagesize($_FILES["slideimage"]["tmp_name"]);
		if ($check !== false) {
			$ready = 1;
		} else {
			$ready = 0;
		}

		// Udah ada belum?
		if (file_exists($target_file)) {
			$_SESSION["upload-message"] = "This image already exists!";
			$ready = 0;
		}

		// Size nya?
		if ($_FILES["slideimage"]["size"] > 1000000) {
			$ready = 0;
		}

		// Form limitation!
		if ($image_file_type !== "jpg" && $image_file_type !== "png" && $image_file_type !== "jpeg" && $image_file_type !== "gif") {
			$ready = 0;
		}

		// Upload
		if ($ready == 0) {
			$_SESSION["upload-message"] = "( jpg, png, jpeg, and gif only ) your upload being failed cause an error!";
		} else {
			if (move_uploaded_file($_FILES["slideimage"]["tmp_name"], $target_file)) {
				copy ("assets/uploadsSlideshow/". $_FILES['slideimage']['name'], "../assets/uploadsSlideshow/" . $_FILES['slideimage']['name']);

				$img = $_FILES["slideimage"]["name"];
				$caption = $_POST["slidecaption"];

				require("config/database.php");
				$sql = "INSERT INTO `site_slider` (`id_slider`, `img`, `caption`) VALUES (NULL, '$img', '$caption')";
				$execute = $db->query($sql);
				if ($execute) {
					$_SESSION["upload-message"] = "New image has been inserted!";
				}
			}
		}		
	}

	function leadUpdate(){
		$id_lead = $_POST["id_lead"];
		$title = $_POST["title"];
		$content = $_POST["editor_content"];
		
		require("config/database.php");
		$sql = "UPDATE `site_lead` SET `title` = '$title', `content` = '$content' WHERE `site_lead`.`id_lead` = 1";
		$execute = $db->query($sql);
		if ($execute) {
			header("location: site.php");
			exit();
		}
	}

	function aboutUpdate(){
		$about = $_POST["about_content"];

		require ("config/database.php");
		$sql = "UPDATE `site_info` SET `about` = '$about' WHERE `site_info`.`id` = 1 ";
		$execute = $db->query($sql);
		if ($execute) {
			header("location: site.php");
			exit();
		}
	}

}
?>