<?php 
	session_start();
	require "config/init.php";
	require "controller/auth.php";
	require "controller/article.php";

	$auth = new Auth();
	$article = new Article();

	$user_id = $_SESSION["admin_id"];
	$result = $auth->executeNotRow("SELECT * FROM user_section_admin WHERE admin_id = $user_id");
	$user_data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mobile English</title>
    
    <meta name="description" content="Mobile English">
    <meta name="keywords" content="Ebook, Mobile English, Bahasa Inggris">
    <meta name="author" content="Robby Lou">
 
    <!-- Custom .css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $style_reset; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $style_desktop; ?>">

    <script src="ckeditor/ckeditor.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<?php include 'sidebar.php'; ?>
	<div class="main-wrapper">
		<?php include 'header.php'; ?>
		<div class="book-wrapper">

			<h4>Article | New entri</h4>

			<div class="newEntri-field">
				<form action="" method="post" enctype="multipart/form-data">

					<div class="form-head">
						<input class="judul" type="text" name="judul_postingan" placeholder="Judul Postingan" required>
						<div class="author">
							Memposting sebagai <em style="color: deepskyblue;"><?php echo $user_data["nama"];?></em>
						</div>
						<div class="form-button">
							<input type="submit" name="article_post" value="publikasikan">
							<input type="submit" name="article_draf" value="simpan">
							<input type="submit" name="article_cancel" value="tutup">
						</div>
					</div>
					<div class="">
						<label>Image</label>
						<br><br>
						<input type="file" name="article_banner">
					</div>
					<br>
					<label>Isi article</label>
					<br><br>
					<div class="form-content">
						<textarea name="article_content"></textarea>
		                <script>
		                        CKEDITOR.replace( 'article_content' );
		                </script>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>