<?php 
class Auth {
	function getMemberByEmail($email){
		require("db.php");
		$sql = "SELECT * FROM users WHERE email ='$email'";
		$execute = $db->query($sql);

		if ($execute == false) {
			return false;
		}

		$row = $execute->fetch_assoc();
		return $row;
	}

	function getTokenByEmail($email){
		require("db.php");
		$sql = "SELECT * FROM tbl_token_auth WHERE email ='$email' and is_expired = 0";
		$execute = $db->query($sql);

		if ($execute == false) {
			return false;
		}

		$row = $execute->fetch_assoc();
		return $row;
	}

	function markAsExpired($tokenId){
		require("db.php");
		$sql = "UPDATE tbl_token_auth SET is_expired = 1 WHERE id = $tokenId";
		$execute = $db->query($sql);

		if ($execute == false) {
			return false;
		} else {
			return true;
		}
	}

	function insertToken($email, $random_password_hash, $random_selector_hash, $expiry_date) {
        require("db.php");
        $sql = "INSERT INTO tbl_token_auth (id, email, password_hash, selector_hash, expiry_date) values (NULL, '$email', '$random_password_hash', '$random_selector_hash', '$expiry_date')";
        $execute = $db->query($sql);

        if ($execute == false) {
			return false;
		} else {
			return true;
		}
    }

    function ssidValidation($email,$ssid){
    	require("db.php");
    	$sql = "SELECT ssid FROM users WHERE email = '$email'";
    	$execute = $db->query($sql);
    	$row = $execute->fetch_assoc();
    	if ($execute == false || $ssid !== $row["ssid"]) {
    		return false;
    	} else if ($execute && $ssid == $row["ssid"]){
    		return true;
    	}
    }

    
}
?>