<?php 

session_start();
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require_once("classes/gate.php");

if(!$isLoggedIn) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "head.php";?>

<body style="overflow: hidden;">

<?php include_once 'header.php';?>

<div class="ss-confirm">
	<h5>
		Terima kasih
	</h5>
	<p>
		Pembayaran anda akan segera kami check dan 
		proses dalam 1x24jam. jika selesai maka buku akan 
		segera ditambahkan ke akun anda sesuai pesanan.
	</p>
	<a class="btn btn-primary" href="index.php">
		Go to Home Page
	</a>
</div>
</body>
</html>