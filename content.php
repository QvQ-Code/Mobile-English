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
        <h2 class="mobi_h2" style="margin-bottom: 0;">Segera selesaikan pembayaran Anda</h2>
        <p>
            Hai <?php echo $_SESSION["ME_UD"]["firstname"]; ?>.
        </p>
        <p>
            Terima kasih atas pesanan Anda, saat ini pesanan berstatus <b>on-hold</b> sampai kami menerima konfirmasi pembayaran Anda, Di bawah ini adalah pengingat tentang apa yang anda pesan.
        </p>
        <p>
            Selesaikan pembayaran Anda. Pesanan tidak akan diproses sebelum anda melakukan konfirmasi pembayaran di <a href="http://localhost/Mobile-English/confirm.php">https://mobileenglish.online/confirm.php</a> dengan menggunakan ID pesanan sebagai referensi.
        </p>
        <h2 style="padding: 0 5%;">
            Detail bank kami
        </h2>
        <h4 style="padding: 0 5%;">
            Mobile English
        </h4>
        <ul style="padding: 0 5%;">
            <li>Bank: <strong>BCA</strong></li>
            <li>Atas Nama: <strong>Robby Lou</strong></li>
            <li>Nomor Rekening: <strong>8780 0812 37</strong></li>
        </ul>       
        <br>
        <h2 style="padding: 0 5%;">
            [Order #<?php echo $_SESSION["ME_OD"]["order_id"];?>] (january 29 2020)
        </h2>
        <table class="mobi-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $_SESSION["ME_SP"]->nama;?></td>
                    <td><?php echo number_format($_SESSION["ME_SP"]->harga,2,",","."); ?></td>
                </tr>
                <tr>
                    <td style="background-color: #f4f4f4">Metode pembayaran:</td>
                    <td>Bank Transfer</td>
                </tr>
                <tr>
                    <td style="background-color: #f4f4f4">Total:</td>
                    <td>Rp.<?php echo number_format($_SESSION["ME_SP"]->harga,2,",",".");?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <h2 style="padding: 0 5%;">
            Billing Address
        </h2>
        <div style="margin: 0 5%; box-shadow: 0px 0px 8px 1px #e4e4e4; padding: 15px">
            <ul>
                <li><?php echo $_SESSION["ME_UD"]["kontak"]; ?></li>
                <li><?php echo $_SESSION["ME_UD"]["email"]; ?></li>
            </ul>
        </div>
        <p>
            Mohon segera selesaikan pembayaran Anda.
        </p>
    </div>
</body>
</html>