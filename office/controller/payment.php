<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// Include librari phpmailer
	include('phpmailer/Exception.php');
	include('phpmailer/PHPMailer.php');
	include('phpmailer/SMTP.php');

class Payment {
	function __construct(){
		if (isset($_POST["confirm_payment"])) {
			$this->confirm();
		}

		if (isset($_POST["delete_payment"])) {
			$this->delete();
		}
	}

	function confirm(){
		$id 		= $_POST["payment_id"];
		$order_id 	= $_POST["order_id"];
		$email 		= $_POST["email"];

		$auth 		= new Auth();

		$data 		= $auth->executeNotRow("SELECT * FROM users WHERE email = '$email'");		
		$user 		= $data->fetch_assoc();
		$user_id 	= $user["user_id"];

		$order 		= $auth->executeNotRow("SELECT * FROM  users_order WHERE order_id = $order_id");
		$data_order = $order->fetch_assoc();

		$pack_id 	= $data_order["pack_id"];
		$pack 		= $auth->executeNotRow("SELECT book_id FROM  site_package_detail WHERE pack_id = $pack_id");

		$auth->runQuery("UPDATE `users_order` SET `Status` = 'success' WHERE `users_order`.`Order_id` = $order_id");
		$auth->runQuery("UPDATE `user_payment` SET `status` = '0' WHERE `user_payment`.`payment_id` = $id");

		while ($pack_data	= $pack->fetch_assoc()) {
			$book_id = $pack_data["book_id"];
			$auth->runQuery("INSERT INTO `users_book_catalog` (`catalog_id`, `user_id`, `book_id`, `timestamp`) VALUES (NULL, '$user_id', '$book_id', CURRENT_TIMESTAMP)");
		}

		// Send Email
		$email_pengirim = 'bluexwhitedc100@gmail.com'; // Isikan dengan email pengirim
		$nama_pengirim = 'Mobile English'; // Isikan dengan nama pengirim
		$email_penerima = $email; // Ambil email penerima dari inputan form
		$subjek = "Mobile English | Konfirmasi pembayaran diterima"; // Ambil subjek dari inputan form

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
		include "acc.php";

		$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
		ob_end_clean();

		$mail->Subject = $subjek;
		$mail->Body = $content;

		$send = $mail->send();

		header("location: payment.php");
		exit();
	}

	function delete(){
		$id = $_POST["payment_id"];
		$auth = new Auth();
		$set = $auth->runQuery("UPDATE `user_payment` SET `status` = '0', `dihapus` = '1' WHERE `user_payment`.`payment_id` = $id");
		if ($set) {
			header("location: payment.php");
			exit();
		}
	}

}

?>