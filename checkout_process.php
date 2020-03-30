<?php

session_start();

ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require "config/database.php";
require "classes/gate.php";
require "classes/UserClass.php";
require "classes/mailer.php";

$user_id 	= $_SESSION["user_id"];// ID user
$pack_id 	= $_GET["package"];// ID paket

// Redirect
if (!$isLoggedIn || empty($_GET["package"])) {
	header("location: index.php");
  	exit();
}

// Ambil data user
if (!empty($user_id)) {
	$sql = "SELECT * FROM users WHERE user_id = $user_id";
	$exe = $db->query($sql);
	$user_data = $exe->fetch_assoc();
	$_SESSION["ME_UD"] = $user_data;
}

// Ambil data paket berdasarkan $pack_id
if (isset($pack_id)) {
	$sql = "SELECT * FROM site_package WHERE pack_id =".$pack_id;
	$pack_data = $db->query($sql);
	$selected_pack = $pack_data->fetch_object();
	$_SESSION["ME_SP"] = $selected_pack;
}

// Deteksi form input
if (isset($_POST["checkout"])) {
	$email 	= trim($user_data["email"]);
	$phone 	= trim($user_data["kontak"]);
	$note 	= trim($_POST["Note"]);
	$date 	= $_POST["Date"];
	$pack	= $pack_id;
	$user 	= $user_id;
	$total 	= $selected_pack->harga;
	$bank  	= $_POST["Bank"];

	$form_input = "INSERT INTO `users_order` (`Order_id`, `Email`, `Phone`, `Note`, `Date`, `pack_id`, `user_id`, `Bank`, `Total`, `Status`) VALUES (NULL, '$email', '$phone', '$note', '$date', '$pack', '$user', '$bank', '$total', 'on-hold')";
	$insert = $db->query($form_input);

	if ($insert) {

		$sql = "SELECT order_id FROM users_order WHERE user_id = $user ORDER BY Order_id ASC";
		$execute = $db->query($sql);
		$order_data = $execute->fetch_assoc();
		$_SESSION["ME_OD"] = $order_data;

		$email_penerima = 'iqbalhasandc200@gmail.com'; // Ambil email penerima dari inputan form
		$subject = "Segera selesaikan pembayaran pesanan mobile english ID Pesanan" . " " .$order_data["order_id"]; // Ambil subjek dari inputan form
		$content = "content.php";

		$send = $mailer->send($email_penerima, $subject, $content);

		if($send){ // Jika Email berhasil dikirim
		    echo "	<div class='input_pop_up'>	
		    		<div class='wrapper'>
		    			<h6>Detail untuk proses pembayaran sudah kami kirimkan, Segera cek email Anda</h6>
		    			<br />
		    			<a href='index.php'>Ok</a>
		    		</div>
		    		</div>";
		}else{ // Jika Email gagal dikirim
			echo "	<div class='input_pop_up'>
					<div class='wrapper'>
						<h6>Email gagal dikirim</h6>
						<br />
						<a onclick='window.history.back()'>Ok</a>
					</div>
					</div>";
		    // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
		}

	} 
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
<div class="container checkout">

	<form action="" method="POST">
		<div class="billing_detail">
		
		<h4>
			Billing details
		</h4>
		<div class="form-group">
			<label>Email Address <strong>*</strong></label>
			<input type="text" name="Email" value="<?php echo $user_data["email"]; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Phone <strong>*</strong></label>
			<input type="text" name="Phone" placeholder="Enter here" value="<?php echo $user_data["kontak"]; ?>" required>
		</div>
		<div class="form-group">
			<label>Your message to us. (optional)</label>
			<textarea name="Note">
				
			</textarea>
		</div>
		<div class="form-group">
			<label>Jadwal Tanggal Bayar</label>
			<input type="date" name="Date" required>
		</div>

		</div>
		<!-- End .Billing Detail -->

		<div class="order">
		
		<h4>
			Your order
		</h4>

		<table class="checkout_table">
		<thead>
			<tr>
				<th>Product</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $selected_pack->nama; ?></td>
				<td><?php echo number_format($selected_pack->harga,2,",","."); ?></td>
			</tr>
			<tr>
				<td class="total">Total</td>
				<td>Rp.<?php echo number_format($selected_pack->harga,0,",","."); ?></td>
			</tr>
		</tbody>
		</table>

		<div class="form-group transfer" style="display: block;">
			<input type="radio" name="Bank" value="BCA" required checked>Transfer bank <br>
			<p>
				Lakukan pembayaran langsung ke rekening kami. Gunakan nomor ID Pesanan yang telah anda terima sebagai referensi pembayaran. Pesanan Anda tidak akan divalidasi sebelum biaya kami terima.
			</p>
		</div>

		<div class="transfer">
			<p>
				Data personal anda akan digunakan untuk memproses pesanan ini.
			</p>
			
			<input type="checkbox" name="Agree" required> Saya mengerti.
			<br>
			<input type="submit" name="checkout" value="Bayar" style="width: 100%; margin: 0;">
		</div>

		</div>
		<!-- End .Order -->

	</form>

</div>
<!-- End .container .checkout-field -->

<script type="text/javascript">
	// Data table
	$(document).ready( function () {
	    $('.checkout_table').DataTable({
	    	searching: false,
	    	ordering:  false,
	    });
	} );
</script>
</body>
</html>
