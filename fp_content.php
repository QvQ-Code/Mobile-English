<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	.fp_message {
		background-color: lightgray;
		padding: 10px;
	}	
	.fp_message .inner {
		background-color: white;
		border-top: 4px solid deepskyblue;
	}
	.fp_message h5 {
		padding: 15px;
		margin: 0;
		font-weight: initial;
		font-size: 1.2rem;
		background-color: #f4f4f4;
	}
	.fp_message .message {
		background-color: white;
		padding: 15px;
		font-size: 1.1rem;
		line-height: 1.5;
		text-align: left;
	}
	.fp_message .message .reset_link {
		background-color: deepskyblue;
		padding: 5px 15px;
		border-radius: 20px;
		text-decoration: none;
		color: white;
		width: initial;
		display: inline-block;
		font-weight: bold;
	}
	.fp_message .footer {
		padding: 15px;
		margin: 0;
		font-weight: initial;
		font-size: .8rem;
		background-color: #f4f4f4;	
	}
	</style>
</head>
<body>
<div class="fp_message">	
<div class="inner">	
	<h5>Password Reset</h5>
	<div class="message">	
		<p>
			Seseorang meminta reset password pada akun <?php echo $user->email; ?>
		</p>
		<p>
			Untuk mereset password mohon klik tombol dibawah ini
		</p>
		<div style="text-align: center;">
			<a class="reset_link" href="http://localhost/Mobile-English/reset_gate.php?fkey=<?php echo $lostKey; ?>&login=<?php echo $email; ?>">Reset Password</a>
		</div>
		<p>
			Jika ini adalah sebuah kesalahan, abaikan saja email ini. password anda tidak akan berubah.
		</p>
	</div>
	<div class="footer">
		<strong>Bermasalah saat click?</strong> Copy dan Paste URL dibawah ini ke browser anda <br>
		<p>http://localhost/Mobile-English/reset_gate.php?fkey=<?php echo $lostKey; ?>&login=<?php echo $email; ?></p>
	</div>
</div>
</div>	
</body>
</html>