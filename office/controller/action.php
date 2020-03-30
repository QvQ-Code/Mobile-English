<?php 
require "utils.php";
class Action {

	function __construct(){
		if (isset($_POST["edit_profile"])) {
			$this->edit_profile();
		}
	}

	function edit_profile(){
		$photo = $_FILES["foto"]["name"];

		// Data Lain
		$role = $_POST["role"];
		$name = $_POST["name"];
		$gender = $_POST["gender"];
		$age = $_POST["age"];
		$email = $_POST["email"];
		$contact = $_POST["contact"];

		// User Ref
		$user_id = $_POST["uid"];

		if (NULL !== $_FILES["foto"]) {
			
			$lock_dir = "assets/profile_img/";
			$file = $_FILES["foto"]["name"];
			$file_tmp = $_FILES["foto"]["tmp_name"];
			$file_size = $_FILES["foto"]["size"];

			$util = new Utils();
			$util->upload_image($lock_dir, $file, $file_tmp, $file_size);
		}

		require "config/database.php";
		$sql = "UPDATE `user_section_admin` SET `nama` = '$name', `role` = '$role', `gender` = '$gender', `usia` = '$age', `email` = '$email', `kontak` = '$contact', `foto` = '$photo' WHERE `user_section_admin`.`admin_id` = '$user_id' ";
		$execute = $db->query($sql);
		if ($execute) {
			header("location: profile.php");
		}
	}
}
?>