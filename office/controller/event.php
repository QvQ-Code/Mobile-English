<?php 

class Event {
	function __construct(){
		if (isset($_GET["set_trial"])) {
			$this->set_trial();		
		}		
	}

	function set_trial(){
		$set = $_GET["set_trial"];

		$auth = new Auth();
		$update = $auth->runQuery("UPDATE book_trial SET `book_id` = $set WHERE item_id = 1");
		if ($update) {
			header("location: event.php");
			exit();
		}
	}
}

?>