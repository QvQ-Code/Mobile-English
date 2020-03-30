<?php

session_start();
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require_once("classes/UserClass.php");
require_once("classes/gate.php");
require_once("config/database.php");

$user = new User();

if (!$isLoggedIn) {
  header("location: index.php");
  exit();
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
<div class="container checkout">

	<?php 
	if (isset($_GET["package"])) {
		$pack_id = $_GET["package"];
	}
	?>

	<div class="invoice">

	<h4>
		Cart
	</h4>

	<table id="Cart_Table" class="cart_table">
		<thead>
			<tr>
				<th>#</th>
				<th>Product</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>< Product Name ></td>
				<td>< Price ></td>
			</tr>
		</tbody>
	</table>

	<h4>
		Cart Totals
	</h4>

	<table id="Totals" class="cart_table">
		<thead>
			<tr>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Subtotal</td>
				<td>< Subtotal ></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>< Totals ></td>
			</tr>
		</tbody>
	</table>

	<a class="to_checkout" href="checkout_process.php">Proses ke checkout</a>

	</div>
	<!-- End .invoice -->

</div>
<!-- End .container .checkout-field -->

<script type="text/javascript">
	$(document).ready( function () {
	    $('.cart_table').DataTable({
	    	searching: false,
	    	ordering:  false,
	    });
	} );

</script>
</body>
</html>
