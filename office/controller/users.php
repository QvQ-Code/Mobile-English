<?php 

class Users {
	function __construct(){
		if (isset($_POST["add_admin"])) {
			$this->add_admin();
		}

		if (isset($_POST["add_member"])) {
			$this->add_member();
		}

		if (isset($_GET["admin_delete_uid"]) || isset($_GET["member_delete_uid"])) {
			$this->delete_user();
		}

		if (isset($_POST["user_new_password"])) {
			$this->user_new_password();
		}

		if (isset($_GET["member_activate_uid"])) {
			$this->activate();
		}
	}


	// Fungsi untuk menambah admin
	function add_admin(){
		$name = $_POST["nama_admin"];
		$username = $_POST["id_admin"];
		$password = password_hash($_POST["password_admin"], PASSWORD_DEFAULT);
		$role = "Administrator";

		$auth = new Auth();
		$sql = "INSERT INTO `user_section_admin` (`admin_id`, `admin_username`, `admin_password`, `nama`, `role`, `tanggal bergabung`, is_active) VALUES (NULL, '$username', '$password', '$name', '$role', CURRENT_DATE, 1)";
		$data = $auth->runQuery($sql);

		if ($data) {
			$_SESSION["add_msg"] = "Admin baru telah ditambahkan.";
			header("location: users.php");
			exit();
		}
	}

	// Fungsi untuk secara manual menambah member
	function add_member(){
		$firstname = $_POST["nama_depan"];
		$lastname = $_POST["nama_belakang"];
		$email = $_POST["user_email"];
		$password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);
		$second_password = password_hash($_POST["second_password"], PASSWORD_DEFAULT);

		$auth = new Auth();
		$sql = "INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `second_password`, `join_on`, `is_active`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$second_password', CURRENT_DATE, 1)";
		$data = $auth->runQuery($sql);

		if ($data) {
			$_SESSION["add_member_msg"] = "Member baru telah ditambahkan.";
			header("location: users.php");
			exit();
		}
	}

	// Hapus user
	function delete_user(){

		if (!empty($_GET["admin_delete_uid"])) {
			$admin = $_GET["admin_delete_uid"];
			$auth = new Auth();

			$delete_admin = $auth->runQuery("UPDATE `user_section_admin` SET `is_active` = '0' WHERE `user_section_admin`.`admin_id` = $admin ");
			if ($delete_admin) {
				unset($admin);
				header("location: users.php");
				exit();
			}
		} else if (!empty($_GET["member_delete_uid"])) {
			$member = $_GET["member_delete_uid"];
			$auth = new Auth();

			$delete_member = $auth->runQuery("UPDATE `users` SET `is_active` = '0' WHERE `users`.`user_id` = $member");
			if ($delete_member) {
				unset($member);
				header("location: users.php");
				exit();	
			}
		}
	}

	// Admin change user password directly
	function user_new_password(){
		$user_id = $_POST["user_id"];
		$password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);
		$auth = new Auth();
		$set = $auth->runQuery("UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id");
		if ($set) {
			$_SESSION["new_password_msg"] = "Password user sudah diubah";
			header("location: users_detail.php");
			exit();
		}
	}

	// Aktifasi kembali user
	function activate(){
		$member = $_GET["member_activate_uid"];
		$auth = new Auth();

		$delete_member = $auth->runQuery("UPDATE `users` SET `is_active` = '1' WHERE `users`.`user_id` = $member");
		if ($delete_member) {
			unset($member);
			header("location: users.php");
			exit();	
		}
	}
}
?>