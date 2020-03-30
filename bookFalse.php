<style type="text/css">
	.container-book-false {
		background-color: white;
		padding: 50px 40px;
		border-radius: 3px;
	}
</style>

<div class="container-book-false">
	
	<h5>Anda belum memiliki buku untuk dibaca.</h5>
	
	<?php  $user_id = $_SESSION['user_id'];?>
	<a class="btn btn-warning" href="addBook.php?id=<?php echo $user_id;?>">Tambah Buku</a>
	

</div>
<!-- End .container-book-false -->