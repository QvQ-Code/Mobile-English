<?php

session_start();
ini_set('display_errors', 0);
error_reporting( E_ALL | E_STRICT );

require_once("classes/UserClass.php");
require_once("classes/gate.php");
require_once('config/database.php');

$user = new User();

if(!$isLoggedIn) {
    header("Location: index.php");
    exit();
}

if (isset($_GET["package"])) {
	$pack_id = $_GET["package"];
	$data = $db->query("SELECT * FROM site_package WHERE pack_id = $pack_id");
	$pack = $data->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
	include "head.php";
?>
<body> 
<?php 
	include "header.php";
?>
<div class="container cart">
	<div class="thumbnail">
		<img src="assets/images/study.png">
	</div>
	<div class="desc">
		<h4>
			<?php echo $pack["nama"]; ?>
		</h4>
		<p>
			Rp.<?php echo number_format($pack["harga"],2,",","."); ?> / Tahun
		</p>
		<p>Isi paket:</p>
		<p>
			<?php echo $pack["keterangan"]; ?>
		</p>
		<a href="checkout_process.php?package=<?php echo $pack["pack_id"]; ?>">
			Langganan Sekarang
		</a>
	</div>
</div>
<!-- End .container-->

</body>
</html>
