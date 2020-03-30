<?php 
session_start();

require 'controller/auth.php';
require 'controller/event.php';

$auth = new Auth();
$event = new Event();

$sql = "SELECT * FROM book_trial";
$data = $auth->executeNotRow($sql);
$trial_data = $data->fetch_assoc();

$book_id = $trial_data['book_id'];

$sql = "SELECT * FROM book WHERE book_id = $book_id";
$data = $auth->executeNotRow($sql);
$book_data = $data->fetch_assoc();

$sql = "SELECT * FROM book";
$buku = $auth->executeNotRow($sql);

$sql = "SELECT * FROM site_package";
$pack_data = $auth->executeNotRow($sql);
?>

<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="event-wrapper">
			<div class="trial-book">
				<h4>Trial Book</h4>
				<div class="trial-now">
					<h3>Buku trial saat ini</h3>
					<div class="cover">
						<img src="assets/uploads/<?php echo $book_data["cover_img"]; ?>">
					</div>
					<div class="title">"<?php echo $book_data["name"]; ?>"</div>
				</div>

				<h4>Setting trial</h4>
				<ul style="list-style-type: square">
					<p>Click judul buku untuk memilih</p>
					<br>
					<?php 
						$a = 1;
						while ($book = $buku->fetch_assoc()) { ?>
					<li>
						<a href="event.php?set_trial=<?php echo $book["book_id"];?>"><?php echo $a++ . ". " . $book["name"];?></a>
					</li>
					<?php } ?>
				</ul>
			</div>

			<div class="trial-book">

				<?php 
					if (isset($_POST["submit_pack"])) {
						$name = $_POST["pack_name"];
						$desc = $_POST["pack_desc"];
						$price = $_POST["pack_price"];
						$pack_item = $_POST["pack_item"];
						
						require 'config/database.php';

						$sql = "INSERT INTO `site_package` (`pack_id`, `nama`, `Keterangan`, `harga`) VALUES (NULL, '$name', '$desc', '$price')";
						$set = $db->query($sql);
						if ($set) {
							$name = trim($_POST["pack_name"]);
							$select = "SELECT * FROM site_package WHERE nama ='$name'";
							$execute = $db->query($select);
							$pack = $execute->fetch_assoc();
							$pack_id = $pack["pack_id"];

							foreach ($pack_item as $key => $value) {
								$set_detail = $db->query("INSERT INTO `site_package_detail` (`pack_id`, `book_id`) VALUES ('$pack_id', '$value')");
							}

							unset($_POST);
							header("location: event.php");
							exit();
						}
					}
				?>

				<h4>
					Daftar Paket buku
				</h4>
				<table class="pack_table">
					<thead>
						<tr>
							<th>#</th>
							<th>Paket</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$a = 1;
					while ($pack = $pack_data->fetch_assoc()){
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $pack["nama"];?></td>
							<td><?php echo $pack["harga"];?></td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
				<br><br>

				<h4>
					Buat paket buku
				</h4>
				<form action="" method="post" id="Create_Pack">
					<div class="item">
					
					<div class="form-group">
						<label>Nama paket</label>
						<input type="text" name="pack_name" required>
					</div>

					<div class="form-group">
						<label>Deskripsi Paket</label>
						<textarea name="pack_desc">
							
						</textarea>
						<script>CKEDITOR.replace( 'pack_desc' );</script>
					</div>

					<div class="form-group">
						<label>Harga Paket</label>
						<input type="text" name="pack_price" required>
					</div>

					<div class="form-group">
						<label>Active</label>
						<select name="duration">
							<option></option>
							<option></option>
							<option></option>
							<option></option>
						</select>
					</div>

					</div>

					<div class="item">
					<div class="form-group" style="padding: 0; background-color: #fff"> 
						<label>Isi Paket</label>
					</div>
					<?php 
						$sql = "SELECT * FROM book";
						$buku = $auth->executeNotRow($sql);
						while ($book = $buku->fetch_assoc()) {
					?>
					
					<div class="form-group">
						<input type="checkbox" name="pack_item[]" value="<?php echo $book["book_id"];?>"><?php echo $book["name"]; ?><br>
					</div>

					<?php
						}
					?>
					<br>
					<input type="submit" name="submit_pack" value="Simpan">
					</div>
				</form>
				
			</div>	
			<!-- End Package -->
		</div>
		<!-- End event-wrapper -->

	</div>
</div>
<?php include 'js.php'; ?>
<script type="text/javascript">
	$(document).ready( function () {
    	$('.pack_table').DataTable({
    		ordering: false,
    		paging: false,
    		searching: false,
    	});
	} );
</script>
</body>
</html>