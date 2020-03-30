<?php 

session_start();

require 'controller/auth.php';

$auth = new Auth();
$sql = "SELECT * FROM user_payment WHERE status = '0' AND dihapus = '0' ORDER BY date DESC";
$confirm = $auth->executeNotRow($sql);

// Deleted data
$sql = "SELECT * FROM user_payment WHERE status = '0' AND dihapus = '1' ORDER BY date DESC";
$delete = $auth->executeNotRow($sql);


?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container">
	
	<?php include 'sidebar.php'; ?>

	<div class="main-wrapper">

		<?php include 'header.php'; ?>

		<div class="payment-history">
			<h4>Analisa</h4>
			<div class="item">
				<h3>Pendapatan bulan <?php echo date("F") ?></h3>
				<div class="list">
					<div class="hasil">
					<?php 
						$sum = $auth->executeNotRow("SELECT SUM(jumlah) FROM user_payment WHERE status = 0 GROUp BY MONTH(date) DESC");
						$sum_data = $sum->fetch_assoc();
						echo "Rp" . number_format($sum_data["SUM(jumlah)"],2,",",".");
					?>
					</div>
				</div>
			</div>
			<h4>Histori pembayaran</h4>
			<div class="item">
				<h3>Confirmed</h3>
				<p>Diurutkan berdasarkan tanggal konfirmasi terakhir</p>
				<br>
				<?php while ($confirm_data = $confirm->fetch_assoc()) { ?>
				
				<div class="list">
					<div class="list-item">
						<div class="head">Email</div>
						<div><?php echo $confirm_data["email"];?></div>
					</div>	
					<div class="list-item">
						<div class="head">Dikonfirmasi tanggal</div>
						<div><?php echo $confirm_data["date"];?></div>
					</div>
					<div class="list-item">
						<div class="head">Total pembayaran</div>
						<div>Rp<?php echo number_format($confirm_data["jumlah"],2,",",".");?></div>
					</div>
				</div>

				<?php } ?>
			</div>
			<div class="item">
				<h3>Deleted</h3>
				<p>Diurutkan berdasarkan tanggal penghapusan terakhir</p>
				<br>

				<?php while ($delete_data = $delete->fetch_assoc()) { ?>
				
				<div class="list">
					<div class="list-item">
						<div class="head">Nama</div>
						<div><?php echo $delete_data["email"];?></div>
					</div>	
					<div class="list-item">
						<div class="head">Tanggal</div>
						<div><?php echo $delete_data["date"];?></div>
					</div>
					<div class="list-item">
						<div class="head">Total pembayaran</div>
						<div>Rp.<?php echo number_format($delete_data["jumlah"],2,",",".") . " " . $delete_data["bank"];?></div>
					</div>
				</div>

				<?php } ?>

			</div>
		</div>
	</div>

</div>
<?php include 'js.php'; ?>
</body>
</html>