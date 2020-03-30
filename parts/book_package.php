<?php  
	require 'config/database.php';

	$data = $db->query("SELECT * FROM site_package");
?>
<h4>Paket Buku</h4>
<div class="book_package">
	<?php  
	while ($pack = $data->fetch_assoc()) {
	?>
	<a href="cart.php?package=<?php echo $pack["pack_id"]; ?>">
		<div class="item">
			<img src="assets/images/logo.png">
		</div>
		<p><?php echo $pack["nama"]; ?></p>
	</a>
	<?php	
	}
	?>
</div>
<div style="display: none;">
	<h4>
			<?php echo $pack["nama"]; ?>
		</h4>
		<div class="thumbnail">
			<img src="assets/images/study.png">
		</div>
		<p>
			<?php echo $pack["keterangan"]; ?>
		</p>
		<p>
			Rp.<?php echo number_format($pack["harga"],2,",","."); ?>
		</p>
		<a href="cart.php?package=<?php echo $pack["pack_id"]; ?>">
			Langganan
		</a>
</div>