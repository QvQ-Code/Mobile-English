<?php 

session_start();

$user_ref = $_SESSION["user_id"];

require("classes/db.php");
$sql = "UPDATE `users` SET `ssid` = '' WHERE `users`.`user_id` = $user_ref";
$execute = $db->query($sql);

$_SESSION["user_id"] = "";
session_destroy();

require_once "classes/utils.php";

$util = new Utils();
$util->clearAuthCookie();

header("Location: index.php");
exit();

?>