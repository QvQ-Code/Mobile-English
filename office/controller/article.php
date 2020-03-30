<?php 
require "utils.php";

class Article {
	function __construct(){
		if (isset($_POST["article_post"])) {
			$this->article_post();
		}
		if (isset($_POST["article_draf"])) {
			$this->article_draf();
		}
		if (isset($_POST["renew_post"])) {
			$this->renew_post();
		}
		if (isset($_POST["renew_draf"])) {
			$this->renew_draf();
		}
		if (isset($_POST["article_cancel"])) {
			$this->article_cancel();
		}
	}

	function article_post() {
		$title = $_POST["judul_postingan"];
		$content = $_POST["article_content"];
		$date = date("d-m-Y");
		$draf = 0;
		$post = 1;

		$auth = new Auth();

		$admin_id = $_SESSION["admin_id"];
		$author = $auth->executeNotRow("SELECT nama FROM user_section_admin WHERE admin_id = $admin_id");
		$user = $author->fetch_assoc();
		$name = $user["nama"];

		// Upload Image
		$lock_dir = "assets/uploads_article/";
		$file = $_FILES["article_banner"]["name"];
		$file_tmp = $_FILES["article_banner"]["tmp_name"];
		$file_size = $_FILES["article_banner"]["size"];

		$util = new Utils();
		$uploadOk = $util->upload_image($lock_dir, $file, $file_tmp, $file_size);

		var_dump($uploadOk);

		$post_sql = "INSERT INTO `site_article` (`article_id`, `banner`, `title`, `content`, `date`, `author`, `draf`, `post`) VALUES (NULL, '$file', '$title', '$content', $date, '$name', $draf, $post)";
		$result = $auth->runQuery($post_sql);
		var_dump($result);
		
	}

	function article_draf() {
		$title = $_POST["judul_postingan"];
		$content = $_POST["article_content"];
		$date = new DateTime;
		$draf = 1;

		$auth = new Auth();

		$admin_id = $_SESSION["admin_id"];
		$author = $auth->executeNotRow("SELECT nama FROM user_section_admin WHERE admin_id = $admin_id");
		$user = $author->fetch_assoc();
		$name = $user["nama"];

		// Upload Image
		$lock_dir = "assets/uploads_article/";
		$file = $_FILES["article_banner"]["name"];
		$file_tmp = $_FILES["article_banner"]["tmp_name"];
		$file_size = $_FILES["article_banner"]["size"];

		$util = new Utils();
		$uploadOk = $util->upload_image($lock_dir, $file, $file_tmp, $file_size);

		$result = $auth->runQuery("INSERT INTO `site_article` (`article_id`, `banner` `title`, `content`, `date`, `author`, `draf`) VALUES (NULL, '$file', '$title', '$content', CURRENT_TIMESTAMP, '$name', '1');");
		if ($result) {
			header("location: article.php");
		}
	}

	function renew_post() {
		$id = $_POST["article_id"];
		$banner = $_FILES["article_banner"]["name"];
		$title = $_POST["judul_postingan"];
		$content = $_POST["article_content"];
		$post = 1;
		$draf = 0;

		$auth = new Auth();

		$admin_id = $_SESSION["admin_id"];
		$author = $auth->executeNotRow("SELECT nama FROM user_section_admin WHERE admin_id = $admin_id");
		$user = $author->fetch_assoc();
		$name = $user["nama"];

		if (!empty($_FILES["article_banner"]["name"])) {
			// Upload Image
			$lock_dir = "assets/uploads_article/";
			$file = $_FILES["article_banner"]["name"];
			$file_tmp = $_FILES["article_banner"]["tmp_name"];
			$file_size = $_FILES["article_banner"]["size"];

			$util = new Utils();
			$uploadOk = $util->upload_image($lock_dir, $file, $file_tmp, $file_size);

			$result = $auth->runQuery("UPDATE `site_article` SET `banner` = '$file', `title` = '$title', `content` = '$content', `date` = CURRENT_TIMESTAMP, `author` = '$name', `draf` = '$draf', `post` = '$post' WHERE `site_article`.`article_id` = $id");
			if ($result) {
				header("location: article.php");
				exit();
			}
		} else {
			$result = $auth->runQuery("UPDATE `site_article` SET `title` = '$title', `content` = '$content', `date` = CURRENT_TIMESTAMP, `author` = '$name', `draf` = '0', `post` = '1' WHERE `site_article`.`article_id` = $id");
			if ($result) {
				header("location: article.php");
				exit();
			}
			var_dump($result);
		}
	}	

	function renew_draf() {
		$id = $_POST["article_id"];
		$title = $_POST["judul_postingan"];
		$content = $_POST["article_content"];
		$draf = 1;
		$post = 0;

		$auth = new Auth();

		$admin_id = $_SESSION["admin_id"];
		$author = $auth->executeNotRow("SELECT nama FROM user_section_admin WHERE admin_id = $admin_id");
		$user = $author->fetch_assoc();
		$name = $user["nama"];

		if (!empty($_FILES["article_banner"]["name"])) {
			// Upload Image
			$lock_dir = "assets/uploads_article/";
			$file = $_FILES["article_banner"]["name"];
			$file_tmp = $_FILES["article_banner"]["tmp_name"];
			$file_size = $_FILES["article_banner"]["size"];

			$util = new Utils();
			$uploadOk = $util->upload_image($lock_dir, $file, $file_tmp, $file_size);

			$result = $auth->runQuery("UPDATE `site_article` SET `banner` = '$file', `title` = '$title', `content` = '$content', `date` = CURRENT_TIMESTAMP, `author` = '$name', `draf` = '$draf', `post` = '$post' WHERE `site_article`.`article_id` = $id");
			if ($result) {
				header("location: article.php");
				exit();
			}
		} else {
			$result = $auth->runQuery("UPDATE `site_article` SET `title` = '$title', `content` = '$content ',`date` = CURRENT_TIMESTAMP, `author` = '$name', `draf` = '$draf', `post` = '$post' WHERE `site_article`.`article_id` = $id");
			if ($result) {
				header("location: article.php");
				exit();
			}
		}
	}

	function article_cancel() {
		header("location: article.php");
		exit();
	}

}
?>