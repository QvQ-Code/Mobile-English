<?php

session_start();
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require"classes/UserClass.php";
require "classes/gate.php";
require 'config/database.php';

$user 		= new User();
$user_id	= $_SESSION["user_id"];

if (!$isLoggedIn) {
  header("location: index.php");
  exit();
}

// Ambil data order
if (!empty($user_id)) {
	$order 		= "SELECT * FROM users_order WHERE User_id = $user_id AND Status = 'on-hold'";
	$order_data = $db->query($order);
}

?>
<!DOCTYPE html>
<html lang="en">
<?php 
	include "head.php";
?>
<body>
<?php 
	include "header.php";
?>
<div class="container">

	<div id="User_Order">
	
	<h4>
		Orders
	</h4>	
	<br>
	<table class="order_table">
		<thead>
			<tr>
				<th>Order</th>
				<th>Date</th>
				<th>Status</th>
				<th>Total</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		
		<?php 
			while ($td = $order_data->fetch_object()) {
		?>

		<tr>
			<td><strong>#</strong><?php echo $td->Order_id; ?></td>
			<td><?php echo $td->Date; ?></td>
			<td><?php echo $td->Status; ?></td>
			<td><?php echo $td->Total; ?></td>
			<td></td>
		</tr>

		<?php  
			}
		?>
		
		</tbody>
	</table>

	<?php 
		$order 		= "SELECT * FROM users_order WHERE User_id = $user_id AND Status = 'success'";
		$order_data = $db->query($order);
	?>
	<br><br>
	<h4>
		Order History
	</h4>	
	<br>
	<table class="order_table">
		<thead>
			<tr>
				<th>Order</th>
				<th>Date</th>
				<th>Status</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
		
		<?php 
			while ($td = $order_data->fetch_object()) {
		?>

		<tr>
			<td><strong>#</strong><?php echo $td->Order_id; ?></td>
			<td><?php echo $td->Date; ?></td>
			<td><?php echo $td->Status; ?></td>
			<td><?php echo $td->Total; ?></td>
		</tr>

		<?php  
			}
		?>
		
		</tbody>
	</table>

	</div>
	<!-- End User_Order -->

</div>
<!-- End .container .checkout-field -->

<script type="text/javascript">
	$(document).ready( function () {
	    $('.order_table').DataTable({
	    	searching: false,
	    	ordering:  false,
	    });
	} );

</script>
</body>
</html>
