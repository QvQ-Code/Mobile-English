<?php 

require "utils.php";
class Book {

	function __construct(){
		if (isset($_POST["new_book"])) {
			$this->book_add();
		}

		if (isset($_POST["edit_book_detail"])) {
			$this->book_detail_edit();
		}

		if (isset($_POST["book_add_chapter"])) {
			$this->book_add_chapter();
		}

		if (isset($_POST["chapter_edit"])) {
			$this->chapter_edit();
		}

		if (isset($_GET["delete_bid"])) {
			$this->delete_book();
		}
	}

	function book_add() {
		// Collect Book Element
		$cover = $_FILES["book_cover"]["name"];
		$title = $_POST["book_title"];
		$price = $_POST["book_price"];
		$decription = $_POST["editor_content"];

		// Upload Image
		$lock_dir = "assets/uploads/";
		$file = $_FILES["book_cover"]["name"];
		$file_tmp = $_FILES["book_cover"]["tmp_name"];
		$file_size = $_FILES["book_cover"]["size"];

		$util = new Utils();
		$uploadOk = $util->upload_image($lock_dir, $file, $file_tmp, $file_size);

		if ($uploadOk) {
			$auth = new Auth();
			$sql = "INSERT INTO `book` (`book_id`, `book_num`, `cover_img`, `name`, `sinop`) VALUES (NULL, '', '$cover', '$title', '$decription')";
			$result = $auth->runQuery($sql);
			if ($result) {
				header("location: book.php");
			}
		}
	}

	function book_detail_edit() {

		$book_id = $_POST["book_id"];
		$cover = $_FILES["cover-buku"]["name"];
		$title = $_POST["judul"];
		$price = $_POST["harga"];
		$description = $_POST["desc_content"];

		if (!empty($_FILES["cover-buku"]["name"])) {
			
			// Upload Image
			$lock_dir = "assets/uploads/";
			$file = $_FILES["cover-buku"]["name"];
			$file_tmp = $_FILES["cover-buku"]["tmp_name"];
			$file_size = $_FILES["cover-buku"]["size"];

			$util = new Utils();
			$uploadOk = $util->upload_image($lock_dir, $file, $file_tmp, $file_size);

			$sql = "UPDATE `book` SET `cover_img` = '$file', `name` = '$title', `harga` = '$price', `sinop` = '$description' WHERE `book`.`book_id` = '$book_id' ";
			$auth = new Auth();
			$result = $auth->runQuery($sql);
			if ($result) {
				header("location: book_detail.php?book_ref=$book_id");
			}

		} else {
			
			$sql = "UPDATE `book` SET `name` = '$title', `harga` = '$price', `sinop` = '$description' WHERE `book`.`book_id` = '$book_id' ";
			$auth = new Auth();
			$result = $auth->runQuery($sql);
			if ($result) {
				header("location: book_detail.php?book_ref=$book_id");

			}			
		}
	}

	function book_add_chapter() {
		require 'config/database.php';

		$id = $_POST["id"];
		$num = $_POST["nomor_chapter"];
		$title = $_POST["judul"];
		$content = $_POST["chapter_content"];
		$page = 1;

		foreach ($content as $key => $value) {
			$page = $page++;
			$chapter_sql = "INSERT INTO `book_chapter` (`chapter_id`, `book_id`, `chapter`, `page`, `heading`, `content`) VALUES (NULL, '$id', '$num', '$page', '$title', '$value')";
			$go = $db->query($chapter_sql);						
		}
		if ($chapter_insert) {
			header("location: book_detail.php?book_ref=$id");
		}
	}

	function delete_book() {
		$book_id = $_GET["delete_bid"];
		$sql = "DELETE FROM `book` WHERE `book`.`book_id` = '$book_id'";
		$auth = new Auth();
		$result = $auth->runQuery($sql);
		if ($result) {
			header("location: book.php");
			exit();
		}
	}

	function chapter_edit() {
		require 'config/database.php';
		$book_id = $_GET['book_ref'];
		$chapter_ref = $_GET["ch_ref"];

		$chapter = $_POST["chapter_num"];
		$heading = $_POST["chapter_heading"];
		$page = $_POST["page"];
		$chapter_id = $_POST["chapter_id"];
		$content = $_POST["chapter_content"];

		if (!empty($_POST["add_chapter_content"])) {
			$add_chapter = $_POST["add_chapter_content"];

			$page_sql = "SELECT page FROM book_chapter WHERE book_id = $book_id AND chapter = $chapter_ref ORDER BY page DESC";
			$page_data = $db->query($page_sql);
			$page = $page_data->fetch_assoc();
			$page_inc = $page["page"] + 1;

			foreach ($add_chapter as $key => $add_page) {
				$inc = $page_inc++;

				$add_page_sql = "INSERT INTO `book_chapter` (`chapter_id`, `book_id`, `chapter`, `page`, `heading`, `content`) VALUES (NULL, $book_id, $chapter_ref, $inc, '$heading', '$add_page')";
				$add_page_process = $db->query($add_page_sql);
				var_dump(
					$page_inc,
					$add_page_process
				);
			}
		}

		for ($i=0, $count = count($chapter_id); $i < $count; $i++) { 
			$id = $chapter_id[$i];
			$c = $content[$i];
			$h = $heading;

			$update_sql = "UPDATE `book_chapter` SET `chapter` = $chapter, `heading` = '$h', `content` = '$c' WHERE `book_chapter`.`chapter_id` = $id";
			$update_proses = $db->query($update_sql);
		}

		if ($update_proses) {
			//header("location: book_detail.php?book_ref=$book_id");
			//exit();
		}
	}

}
?>