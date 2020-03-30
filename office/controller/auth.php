<?php 
class Auth {

	function runQuery($sql){
		require "config/database.php";
		$execute = $db->query($sql);
		if ($execute) {
			return true;
		} else {
			return false;
		}
	}

	function executeNotRow($sql){
		require "config/database.php";
		$execute = $db->query($sql);
		return $execute;
	}

	function getAdminById($id){
		require "config/database.php";
		$sql = "SELECT * FROM user_section_admin WHERE admin_id = '$id'";
		$execute = $db->query($sql);
		$row = $execute->fetch_assoc();
		return $row;
	}

}
?>
