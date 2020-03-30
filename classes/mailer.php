<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

class Mailer {
    function send($email_penerima,$subjek,$content){
		require "config/init.php";
		
        $email_pengirim = $email; // Isikan dengan email pengirim
		$nama_pengirim = 'Mobile English'; // Isikan dengan nama pengirim

		$mail = new PHPMailer;
		$mail->isSMTP();

		$mail->Host = 'smtp.gmail.com';
		$mail->Username = $email_pengirim; // Email Pengirim
		$mail->Password = $email_pass; // Isikan dengan Password email pengirim
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

		$mail->setFrom($email_pengirim, $nama_pengirim);
		$mail->addAddress($email_penerima, '');
		$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

		// Load file content.php
		ob_start();
		include $content;

		$mail_content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
		ob_end_clean();

		$mail->Subject = $subjek;
		$mail->Body = $mail_content;

		$send = $mail->send();

		if($send){ // Jika Email berhasil dikirim
		    return true;
		}else{ // Jika Email gagal dikirim
			return false;
		}
    }
}

// Mailer Start!
$mailer = new Mailer();

?>