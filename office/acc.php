<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
        .mobi_container {
            border: 1px solid rgba(0,0,0,.3);
            line-height: 1.3;
            color: #444;
            padding-bottom: 30px;
        }
        .mobi_container p {
            padding: 0 5%;
            text-align: justify;
        }
        .mobi_container h1, h2, h3, h4, h5, h6 {
            color: blue;
        }
        .mobi_container .mobi_h2 {
            height: 60px;
            line-height: 60px;
            font-size: 1rem;
            text-align: center;
            background-color: deepskyblue;
            color: white;
            margin: 0;
        }
        .mobi_container .mobi-table {
            box-shadow: 0px 0px 8px 1px #e4e4e4;
            width: 100%;
        }

        .mobi_container .mobi-table tr th {
            height: 40px;
            border-bottom: 1px dashed #333;
        }
        .mobi_container .mobi-table tr td {
            height: 40px;
            line-height: 40px;
            padding: 0 20px;
        }
        .mobi_container ul li {
            list-style-position: inside;
            list-style-type: square;
        }
    </style>
</head>
<body>
    <div class="mobi_container">
        <h2 class="mobi_h2" style="margin-bottom: 0;">Pembayaran diterima ID pesanan #<?php echo $order_id; ?></h2>
        <p>
            Hai <?php echo $user['firstname']; ?>.
        </p>
        <p>
            Pembayaran Anda telah kami terima dan pesanan sudah diproses. Anda sudah dapat membaca ebook yang anda pesan pada akun anda. Selamat membaca, dan semoga hari Anda menyenangkan :)
        </p>
        <p>
            Terima kasih
        </p>
    </div>
</body>
</html>