<?php 
	session_start();

	if (isset($_GET["del_id"])) {
		$sentence_id = $_GET["del_id"];

		if ($sentence_id > 0) {
			require "config/database.php";

			$sql = "SELECT * FROM site_sentence WHERE sentence_id=".$sentence_id;
			$check = $db->query($sql);
			$rows = mysqli_num_rows($check);

			if ($rows > 0) {
			$sql = "DELETE FROM `site_sentence` WHERE `site_sentence`.`sentence_id` = $sentence_id";
    		$a = $db->query($sql);
    		if ($a) {
    			header("location: sentence_table.php");
    			exit();
    		} else {
			?>
			<script type="text/javascript">
				alert("Invalid SENTENCE_ID");		
			</script>
			<?php
    			}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<?php 
	include 'head.php';
?>
<body>

<div class="container">
<?php 
	include 'sidebar.php';
?>		
<div class="main-wrapper">
	<?php 
		include 'header.php';
	?>
	<div class="wod-table">
	<table id="sentence_table" class="display">
    <thead>
    <tr>
        <th>#</th>
        <th>Sentence</th>
        <th>Keyword</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
	    require 'config/database.php';
		$sql = "SELECT * FROM site_sentence";
		$execute = $db->query($sql);
	    $a = 1; 

	    while ($sentence = $execute->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $a++;?></td>
        <td><?php echo $sentence["sentence"];?></td>
        <td><?php echo $sentence["keyword"];?></td>
        <td class="table-action">
            <span style="margin-right: 30px;">
            	<abbr title="Edit">
            	<a href=".php?edit_id=<?php echo $wod["id"]; ?>">
            		<svg style="width:24px;height:24px" viewBox="0 0 24 24">
					    <path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z" />
					</svg>
            	</a>	
            	</abbr>
            </span>
            <span style="margin-right: 30px;">
            	<abbr title="Delete">
            	<a href="lesson_table.php?del_id=<?php echo $wod["id"]; ?>" class="delete" data-confirm="Hapus data ini?">
            		<i class="material-icons">
					delete_forever
					</i>
				</a>	
            	</abbr>
            </span>
        </td>
    </tr>
    <?php 
    	}
    ?>
    </tbody>
	</table>

	</div>
</div>
</div>
<!-- End Container -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#sentence_table').DataTable();
	});

	var deleteLinks = document.querySelectorAll('.delete');

	for (var i = 0; i < deleteLinks.length; i++) {
	    deleteLinks[i].addEventListener('click', function(event) {
	        event.preventDefault();

	        var choice = confirm(this.getAttribute('data-confirm'));

	        if (choice) {
	          window.location.href = this.getAttribute('href');
	        }
	    });
	  }
</script>
</body>
</html>