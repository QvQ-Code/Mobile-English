<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

require("auth.php");
require("utils.php");

class Action {

	public function __construct(){
		// Deteksi login user
		if (isset($_POST["login-user"])) {
			$this->login();
		}

		// Deteksi lost password Request
		if (isset($_POST["forgot-password"])) {
			$this->forgot_password();
		}
	}

	// Login Function untuk user
	/*
		Required atribute
		-> User email
		-> User Password
	*/
	function login(){
		$authenticated = false;
		$sessionClear = false;

		$ssid = session_id();
		$email = trim($_POST["email"]);
		$password = trim($_POST["password"]);

		$auth = new Auth();
		$row = $auth->getMemberByEmail($email);	

		if (password_verify($password, $row["password"])) {
			$authenticated = true;
		}


		if ($authenticated) {

			if (!empty($row["ssid"]) && $ssid !== $row["ssid"]) {
				$_SESSION["reclaim_ref"] = $row["user_id"];
				$_SESSION['login-message'] = "Akun ini sedang digunakan. atau belum logout dari sesi sebelumnya." . " <a href='reclaim.php' style='color: red'>Reclaim</a>";
				unset($_POST);
				header("location: login.php");
				exit();
			} else {
				$_SESSION["user_id"] = $row["user_id"];
	            
	            require("db.php");
	            $sql = "UPDATE `users` SET `ssid` = '$ssid' WHERE `users`.`email` = '$email' ";		
	            $execute = $db->query($sql);
			} 

			if (! empty($_POST["remember"])) {
				
				// Get Current date, time
				$current_time = time();
				$current_date = date("Y-m-d H:i:s", $current_time);

				// Set Cookie expiration for 1 month
				$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

				$utils = new Utils();

				setcookie("member_login", $email, $cookie_expiration_time);
            
	            $random_password = $utils->getToken(16);
	            setcookie("random_password", $random_password, $cookie_expiration_time);	
	            
	            $random_selector = $utils->getToken(32);
	            setcookie("random_selector", $random_selector, $cookie_expiration_time);

	            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            	$random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            	$expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            	$userToken = $auth->getTokenByEmail($email);
            	if (! empty($userToken["id"])) {
            		$auth->markAsExpired($userToken["id"]);
            	}

            	$auth->insertToken($email, $random_password_hash, $random_selector_hash, $expiry_date);
			} else {
				$utils = new Utils();
				$utils->clearAuthCookie();
			}

		} else {
			$_SESSION["login-message"] = "Invalid Email or Password.";
		}
	}/* End Login Function */

	// Lost password Request function
	/*
	*	Atribut yang dibutuhkan
	*	-> Email
	*/
	function forgot_password(){
		$utils = new Utils();

		$email = $_POST["email"];

		require 'db.php';
		// Insert Key
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$data = $db->query($sql);
		$user = $data->fetch_object();
		$user_id = $user->user_id;

		$lostKey = $utils->getToken(16);

		$set = "UPDATE `users` SET `fpassword_key` = '$lostKey' WHERE `users`.`user_id` = '$user_id'";
		$add_key = $db->query($set);
		
		if ($add_key) {
			$email_pengirim = 'bluexwhitedc100@gmail.com'; // Isikan dengan email pengirim
			$nama_pengirim = '[ Reset password ] Mobile English'; // Isikan dengan nama pengirim
			$email_penerima = $email; // Ambil email penerima dari inputan form
			$subjek = "Forgot password"; // Ambil subjek dari inputan form

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
			include "fp_content.php";

			$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
			ob_end_clean();

			$mail->Subject = $subjek;
			$mail->Body = $content;

			$send = $mail->send();

			if($send){ // Jika Email berhasil dikirim
				$_SESSION["lost-p-message"] = "Cek email dari kami untuk melakukan reset password";			    
			}else{ // Jika Email gagal dikirim
				$_SESSION["lost-p-message"] = "Email gagal dikirim";
			}			
		}

	}/* End Lost password request function */

}
?>

