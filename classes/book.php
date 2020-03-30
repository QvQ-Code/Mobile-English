<?php 

class Book {

	function active_book($value){

		if (!empty($value)) {
			require 'db.php';
			$sql = "SELECT * FROM book";
			$data = $db->query($sql);
			return $data;
		} else {
			require 'db.php';
			$sql = "SELECT * FROM book LIMIT 3";
			$data = $db->query($sql);
			return $data;
		}

	}

}

?>