<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require "classes/mailer.php";

$penerima   = "iqbalhasandc200@gmail.com";
$subject    = "Mail Test!";
$content    = "content.php";

$send = $mailer->send($penerima, $subject, $content);

if($send){
    echo "Sukses";
} else {
    echo "Gagal";
}

?>