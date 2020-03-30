<?php 

session_start();
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

require_once("classes/UserClass.php");
require("classes/gate.php");
require("config/database.php");

$user = new User();

if (!$isLoggedIn) {
  header("location: index.php");
  exit();
}

if (isset($_POST["konfirmasi_pembayaran"])) {
	$order_id 	= $_POST["order_id"];
	$nama 		= $_POST["pemilik_rekening"];
	$email 		= $_POST["email"];
	$bank 		= $_POST["bank"];
	$date 		= $_POST["date"];
	$jumlah 	= $_POST["nilai_transfer"];
	$note 		= $_POST["note"];
	
	$sql = "INSERT INTO `user_payment` (`payment_id`, `order_id`, `nama`, `email`, `bank`, `tanggal_transfer`, `jumlah`, `pesan`, `date`, `status`, `dihapus`) VALUES (NULL, '$order_id', '$nama', '$email', '$bank', '$date', '$jumlah', '$note', CURRENT_DATE, 1, 0)";
	$insert_confirm = $db->query($sql);
	if ($insert_confirm) {
		
		$email_pengirim = 'bluexwhitedc100@gmail.com'; // Isikan dengan email pengirim
		$nama_pengirim = 'Sistem Mobile English'; // Isikan dengan nama pengirim
		$email_penerima = 'iqbalhasandc200@gmail.com'; // Ambil email penerima dari inputan form
		$subjek = "Konfirmasi pembayaran oleh " . $email; // Ambil subjek dari inputan form

		$mail = new PHPMailer;
		$mail->isSMTP();

		$mail->Host = 'smtp.gmail.com';
		$mail->Username = $email_pengirim; // Email Pengirim
		$mail->Password = 'erenjeager11'; // Isikan dengan Password email pengirim
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

		$mail->setFrom($email_pengirim, $nama_pengirim);
		$mail->addAddress($email_penerima, '');
		$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

		// Load file content.php
		ob_start();
		include "content_confirm.php";

		$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
		ob_end_clean();

		$mail->Subject = $subjek;
		$mail->Body = $content;

		$send = $mail->send();

		if($send){ // Jika Email berhasil dikirim
		    echo "	<div class='input_pop_up'>	
		    		<div class='wrapper'>
		    			<h6>Terima kasih telah melakukan konfirmasi dengan segera, Pesanan Anda akan segera kami proses</h6>
		    			<br />
		    			<a href='index.php'>Ok</a>
		    		</div>
		    		</div>";
		}else{ // Jika Email gagal dikirim
			echo "	<div class='input_pop_up'>
					<div class='wrapper'>
						<h6>Konfirmasi gagal periksa data yang Anda masukan</h6>
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
<html>
<?php 
	include_once "head.php";
?>
<body>
<?php 
	include_once("header.php");
?>	
<div class="container confirm_payment">
	<h4>
		Konfirmasi Pembayaran
	</h4><br><br>
	<form action="" method="post">
		<div class="form-group">
			<label>ID Pesanan*</label>
			<input type="text" name="order_id" required>
		</div>
		<div class="form-group">
			<label>Nama Pemilik Rekening*</label>
			<input type="text" name="pemilik_rekening" required>
		</div>
		<div class="form-group">
			<label>Email*</label>
			<input type="text" name="email" required>
		</div>
		<div class="form-group">
			<label>Bank*</label>
			<select name="bank">
				<option value="BCA">BCA</option>
			</select>
		</div>
		<div class="form-group">
			<label>Tanggal Transfer*</label>
			<input type="date" name="date" required>
		</div>
		<div class="form-group">
			<label>Nilai Transfer</label>
			<input type="text" name="nilai_transfer" required>
		</div>
		<div class="form-group">
			<label>Catatan Tambahan</label>
			<textarea name="note" style="height: 200px; padding: 15px;">
				
			</textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="konfirmasi_pembayaran" value="Konfirmasi">
		</div>
	</form>
</div>
</body>
</html>
