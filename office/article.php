<?php 
	session_start();
	require "controller/auth.php";
	
	$auth = new Auth();

	$article_result = $auth->executeNotRow("SELECT * FROM site_article ORDER BY article_id DESC");

	if (!empty($_GET["delete_ref"])) {
		$delete_ref = $_GET["delete_ref"];

		$deleted = $auth->runQuery("DELETE FROM `site_article` WHERE `site_article`.`article_id` = $delete_ref");
		if ($deleted) {
			unset($_GET["deleted"]);
			header("location: article.php");
			exit();
		}
	}
?>

<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>

	<div class="main-wrapper">
		<?php include 'header.php'; ?>

		<div class="book-wrapper">

			<h4>Article | Semua Postingan</h4>

			<div class="article-button">
				<a href="new_article.php">Entri baru</a>
			</div>

			<table id="article_table" class="display">
			    <thead>
			        <tr>
			        	<th>#</th>
			            <th>Title</th>
			            <th>Status</th>
			            <th>Author</th>
			            <th>Date</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <tbody>
			    <?php while ( $article = $article_result->fetch_assoc() ) { 
					$timestamp = strtotime($article["date"]);
					$date = date('M d, Y', $timestamp);
					$num = 1;
				?>	
			        <tr style="text-align: center;">
			        	<td><?php echo $num++; ?></td>
			            <td style="text-align: left;">
			            	<a href="edit_article.php?art_ref=<?php echo $article["article_id"]; ?>">
								<?php echo substr($article["title"], 0, 300); ?>
							</a>
			            </td>
			            <td>
			            	<?php 
			            		if ($article["draf"] == 1) {
			            			echo "Draf";
			            		} else {
			            			echo "Published";
			            		}
			            	?>
			            </td>
			            <td>By <?php echo $article["author"]; ?></td>
			            <td><?php echo $date; ?></td>
			            <td>
			            	<a href="article.php?delete_ref=<?php echo $article["article_id"]; ?>">Delete</a>
			            </td>
			        </tr>
			    <?php } ?>
			    </tbody>
			</table>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#article_table').DataTable();
	} );
</script>

</body>
</html>