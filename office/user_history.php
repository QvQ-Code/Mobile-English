<?php 

session_start();
require 'controller/auth.php';

$auth = new Auth();

$sql = "SELECT * FROM users WHERE is_active = '0'";
$data = $auth->executeNotRow($sql);

?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="user-history">
			<h4>Deleted users</h4>

			 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

			<ul id="myUL">

				<?php while ($user = $data->fetch_assoc()) {
				?>

				<li>
					<a href="users_detail.php?uid=<?php echo $user["user_id"] ?>"><?php echo $user["firstname"] . " " . $user["lastname"];?></a>
					<a href="users_detail.php?uid=<?php echo $user["user_id"] ?>">Email: <?php echo $user["email"]; ?></a>
				</li>

				<?php
				} ?>
			 
			</ul> 

			<script>
			function myFunction() {
			  // Declare variables
			  var input, filter, ul, li, a, i, txtValue;
			  input = document.getElementById('myInput');
			  filter = input.value.toUpperCase();
			  ul = document.getElementById("myUL");
			  li = ul.getElementsByTagName('li');

			  // Loop through all list items, and hide those who don't match the search query
			  for (i = 0; i < li.length; i++) {
			    a = li[i].getElementsByTagName("a")[0];
			    txtValue = a.textContent || a.innerText;
			    if (txtValue.toUpperCase().indexOf(filter) > -1) {
			      li[i].style.display = "";
			    } else {
			      li[i].style.display = "none";
			    }
			  }
			}
			</script>

		</div>
	</div>
</div>
<?php include 'js.php'; ?>
</body>
</html>