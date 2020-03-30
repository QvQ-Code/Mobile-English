<?php 
require_once "auth.php";
require_once "utils.php";

$auth = new Auth();
$util = new Utils();

// Ambil waktu saat ini
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie untuk 1 bulan
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

$isLoggedIn = false;

if (isset($_SESSION["user_id"]) && ! empty($_SESSION["user_id"])) {
	$isLoggedIn = true;
}
else if (! empty($_COOKIE["member_login"]) && ! empty($_COOKIE["random_password"]) && ! empty($_COOKIE["random_selector"])) {
    
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;
    
    $userToken = $auth->getTokenByEmail($_COOKIE["member_login"]);
    
    if (password_verify($_COOKIE["random_password"], $userToken["password_hash"])) {
        $isPasswordVerified = true;
    }
    
    if (password_verify($_COOKIE["random_selector"], $userToken["selector_hash"])) {
        $isSelectorVerified = true;
    }
    
    if($userToken["expiry_date"] >= $current_date) {
        $isExpiryDareVerified = true;
    }
    
    if (!empty($userToken["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDareVerified) {
        require("db.php");

        $key = $_COOKIE["member_login"];
        $sql = "SELECT user_id FROM users WHERE email = '$key'";
        $execute = $db->query($sql);
        $row = $execute->fetch_assoc();

        $_SESSION["user_id"] = $row["user_id"];
        $isLoggedIn = true;
    } else {
        if(!empty($userToken["id"])) {
            $auth->markAsExpired($userToken["id"]);
        }
        // clear cookies
        $util->clearAuthCookie();
    }
}
?>