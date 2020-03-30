<?php 

session_start();

require 'controller/auth.php';
require 'controller/payment.php';

$auth = new Auth();
$payment = new Payment();

$data = $auth->executeNotRow("SELECT * FROM user_payment WHERE status = 1");

?>

<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div class="container">
	
	<?php include 'sidebar.php'; ?>

	<div class="main-wrapper">
		
		<?php include 'header.php'; ?>

		<div class="payment-wrapper">
			<h4>Konfimasi pembayaran</h4>
			
			<?php while ($payment_data = $data->fetch_assoc()) { ?>
			
			<form action="" method="post">
				
			<div class="payment">
				<div class="detail">
					<div class="date">
						<em style="font-style: italic;">Permintaan konfirmasi pada <strong style="font-weight: bold; color: green"><?php echo $payment_data["date"]; ?></strong></em>
					</div>
					<div class="order-id">
						ID Pesanan: #<?php echo $payment_data["order_id"]; ?>
					</div>
					<div class="nama">
						<?php echo $payment_data["nama"]; ?>
					</div>	
					<div class="email">
						<?php echo $payment_data["email"]; ?>
					</div>

					<div class="jumlah">
						Total Pembayaran Rp.<?php echo number_format($payment_data["jumlah"],2,",","."); ?>
					</div>
					<div class="bank">
						<?php echo $payment_data["bank"]; ?>
					</div>
				</div>
				<?php if (!empty($payment_data["bukti_transaksi"])): ?>
				<div class="foto">
					<h3>Bukti Pembayaran</h3>
					<br>
					<div class="img-thumb">
						<img src="assets/uploadsPayment/<?php echo $payment_data["bukti_transaksi"]; ?>">
					</div>
				</div>
				<?php endif ?>
				<div class="form-button">
					<input type="hidden" name="payment_id" value="<?php echo $payment_data["payment_id"];?>">
					<input type="hidden" name="order_id" value="<?php echo $payment_data["order_id"];?>">
					<input type="hidden" name="email" value="<?php echo $payment_data["email"];?>">
					<input type="submit" name="confirm_payment" value="konfirmasi">
					<input type="submit" name="delete_payment" value="delete">
				</div>
			</div>
			<!-- End payment -->

			</form>
			<!-- End Form -->

			<?php } ?>

		</div>

	</div>
	<!-- End Main wrapper -->

</div>

<?php include 'js.php'; ?>
</body>
</html>