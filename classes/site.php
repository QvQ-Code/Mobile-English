<?php 

class Site {

	function site_lead(){

		require 'db.php';
		$sql = "SELECT * FROM site_lead";
		$data = $db->query($sql);
		$fetch = $data->fetch_assoc();
		return $fetch;

	}

	function site_article($count){

		require 'db.php';
		$sql = "SELECT * FROM site_article WHERE post = 1 ORDER BY date DESC LIMIT $count";
		$data = $db->query($sql);
		return $data;

	}	

	function execute($sql){
		
		require 'db.php';
		$data = $db->query($sql);
		return $data;

	}

}

?>