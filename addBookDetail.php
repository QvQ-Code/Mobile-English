<?php 

session_start();
ini_set('display_errors', 0);
error_reporting( E_ALL | E_STRICT );

require_once("classes/UserClass.php");
require_once("classes/gate.php");
require_once("config/database.php");

$user = new User();

if(!$isLoggedIn) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "head.php";?>

<body>

<?php include_once("header.php");?>

<?php  
	$book_id = $_GET['id'];
	$sql = "SELECT * FROM book WHERE book_id='$book_id'";
	$query = $db->query($sql);
	$row = $query->fetch_assoc();
?>

<div class="add-book-detail">
	<div>
	</div>
	<div class="img-thumbnails">
		<img src="assets/uploads/<?php echo $row["cover_img"];?>">
	</div>
	<div class="book-detail">
		<p class="title"><?php echo $row["name"];?></p>
		<div class="price">
			<?php 
				$sql_price = "SELECT * FROM book_price WHERE book_id ='$book_id'";
				$execute = $db->query($sql_price);
				$price = $execute->fetch_assoc();
			?>
			Rp.<?php echo number_format($price['price'],2,",",".");?>
		</div>
		<div class="sinop">
			<?php echo $row["sinop"];?>
		</div>
	</div>
	<?php 

	if (!isset($_GET['action'])) {
		
	} else { ?>
		<div class="add-button">
		<a href="cart.php?id=<?php echo $row['book_id'];?>&action=add">Add to Cart</a>
	</div>
	<?php 
	}
	?>
</div>

<!-- End .container .addbook-container -->

</body>
</html>
