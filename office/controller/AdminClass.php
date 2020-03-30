 <?php 

class Admin {

	public function __construct(){

		$this->isReady();
		
		if (isset($_POST['admin-login'])){ $this->login();}
		if (isset($_POST['registration'])){ $this->registration();}
		if (isset($_POST['add-book'])){ $this->addBook();}
		if (isset($_POST['add-section'])){ $this->addSection();}
		if (isset($_POST['save_book_change'])){ $this->saveChange();}
		if (isset($_POST['renew-section'])){ $this->renewSection();}

	}

	/*	function isReady()
	*	Check apakah admin telah login atau belum
	*/
	public function isReady(){

	// Membutuhkan koneksi database
	require('config/database.php');

		if (!empty($_SESSION['admin_id'])) {
			return true;
		} else {
			return false;
		}

	}/*	End isReady() */

	/*	Function login() 
	*	Fungsi untuk melakukan validasi login data user, cross-checks dengan database
	*/
	private function login(){

	require('config/database.php');

		if (isset($_POST['admin-login'])) {
			
			$user = $_POST['username'];
			$userpsw = $_POST['password'];

			if (!empty($user) && !empty($userpsw)) {
				
				$sql = "SELECT * FROM `user_section_admin` WHERE `admin_username` ='$user'";
				$query = $db->query($sql);

				if ($query->num_rows == 1) {
					$row = $query->fetch_assoc();

					if ($userpsw == $row['admin_password']) {

						$_SESSION['admin_id'] = $row['admin_id'];
						header("location: index.php");
						exit();
						
					} else {
						$_SESSION['admin_login_message'] = "id atau password salah!";	
					}

				} else {
					$_SESSION['admin_login_message'] = "id atau password salah!";	
				}

			}	else {
				$_SESSION['admin_login_message'] = "Masukan id dan password!";
			}

		} 
	
	}
	/* End login() */

	/* Book List */
	public function book_detail(){
		
	}
	/* End Book List */

	public function addBook(){

		if (isset($_POST['add-book'])) {

		$book_title = $_POST['title'];
		$image_name = $_FILES['coverImage']['name'];
		$book_price = $_POST['harga'];

		$lock_dir = 'assets/uploads/';
		$lock_file = $lock_dir . basename($_FILES['coverImage']['name']);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($lock_file,PATHINFO_EXTENSION));

		$check = getimagesize($_FILES['coverImage']['tmp_name']);
		if ($check !== false) {
			echo "file is an image -" . $check['mime'].".";
			$uploadOk = 1;
		} else {
			echo "file is not an image";
			$uploadOk = 0;
		}

		if (file_exists($lock_file)) {
			echo "Sorry file already Exists";
			$uploadOk = 0;
		}

		if ($_FILES["coverImage"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $lock_file)) {
		    	copy ("assets/uploads/". $_FILES['coverImage']['name'], "../assets/uploads/" . $_FILES['coverImage']['name']);
		    	require('config/database.php');
		    	$sql = "INSERT INTO `book` (`book_id`, `cover_img`, `name`) VALUES (NULL, '$image_name','$book_title')";
		    	$query = $db->query($sql);
		    	$book_id = mysqli_insert_id($db); 
		    	$sql2 = "INSERT INTO `book_price` (`book_id`, `price`) VALUES ($book_id, $book_price)";
		    	$query2 = $db->query($sql2);
		    	if ($query && $query2) {
		    		header("location: addSection.php");
		    	}
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		}

	}/* End addBook() */

	public function addSection() {
		if (isset($_POST['add-section'])) {

			require("config/database.php");

			$book_id = $_POST['book_id'];
			$chapter_num = $_POST['chapter'];
			$chapter_head = $_POST['heading'];
			$content = $_POST['editor_content'];

			$sql = "INSERT INTO `book_chapter` (`book_id`, `chapter`, `heading`, `content`) VALUES ('$book_id', '$chapter_num', '$chapter_head', '$content')";
			$query = $db->query($sql);
		}
	}

	public function saveChange(){
		if (isset($_POST['save_book_change'])) {

			require("config/database.php");

			$book_id = $_POST['book_id'];
			$book_title = $_POST['book_name'];
			$book_price = $_POST['harga'];
			$book_description = $_POST['editor_content'];

			$sql = "UPDATE `book` SET `name` = '$book_title', `sinop` = '$book_description' WHERE `book`.`book_id` = $book_id ";
			$result = $db->query($sql);

			$sql2 = "UPDATE `book_price` SET `price` = '$book_price' WHERE `book_price`.`book_id` = $book_id";
			$result2 = $db->query($sql2);

			if($result && $result2) {
				header('location: bookView.php');
			}
		}
	}

	public function renewSection(){
		if (isset($_POST['renew-section'])){
			require('config/database.php');

			$book_id = $_POST['book_id'];
			$chapter_ref = $_POST['heading_ref'];
			$heading = $_POST['heading'];
			$content = $_POST['editor_content'];

			$sql = "UPDATE `book_chapter` SET `heading` = '$heading', `content` = '$content' WHERE `book_chapter`.`heading` = '$chapter_ref'";
			$query = $db->query($sql);
			
			header("location: bookView.php");

		}
	}	
}

 ?>