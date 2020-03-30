<?php  

    class User{

        public $isLoggedIn = false;

    	public function __construct(){

            // Deteksi registration request
    		if (isset($_POST['registration'])){ 
                $this->registration(); 
            }

            // Deteksi konfirmasi pembayaran
            if (isset($_POST['pay-confirm-button'])){ 
                $this->confirmPayment(); 
            }

    	}/* End __consturct */


    	/*	Function registration()
    	*	Input data pendaftar
    	*/
    	private function Registration(){
        
            // Require credentials for DB connection.
            require ('config/database.php');

                // Variables for createUser()
                $firstname = trim($_POST['firstName']);
                $lastname = trim($_POST['lastName']);
                $password = trim($_POST['password']);
                $password2 = trim($_POST['password2']);
                $second_password = trim($_POST['second_password']);
                $email = $_POST['email'];
                $trial = $_POST['trial'];
                
                if($password===$password2){
                    // Hash user pass
                    $securing = password_hash($password, PASSWORD_DEFAULT);
                    $second_securing = password_hash($second_password, PASSWORD_DEFAULT);

                    if(!empty($username) && !empty($password) && !empty($email)){

                        // Check if username or email is already taken.
                        $stmt = $db->prepare("SELECT  email FROM users WHERE email = ?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $stmt->close();
                        
                        // Check if email is in the correct format.
                        if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)){
                            header('Location: registration.php');
                            $_SESSION['message'] = 'Please insert correct e-mail.';
                            exit();
                        }
                        
                        // If username or email is taken.
                        if ($result->num_rows != 0) {
                            // Promt user error about username or email already taken.
                            header('Location: registration.php');
                            $_SESSION['message'] = 'Username or e-mail is taken!';
                            exit();
                        } else {
                            // Insert data into database
                            $code = substr(md5(mt_rand()),0,15);
                            $stmt = $db->prepare("INSERT INTO users (firstname, lastname, email, password, second_password, activation_code, trial) VALUES (?,?,?,?,?,?,?)");
                            $stmt->bind_param("sssssss", $firstname, $lastname, $email, $securing, $second_securing, $code, $trial);
                            $stmt->execute();
                            $stmt->close();
                            
                            // If registration is successful return user to registration.php and promt user success pop-up.
                            
                            $_SESSION["ready_email"] = $email;
                            $_SESSION['login-message'] = 'Your account has been created! Please login to continue';
                            header('Location: login.php');
                            exit();
                        } 

                    } else {
                        // If registration fails return user to registration.php and promt user failure error.
                        header('Location: registration.php');
                        $_SESSION['message'] = 'Please fill all fields!';
                        exit();
                    }
                } else {
                    header('Location: registration.php');
                    $_SESSION['message'] = '';
                    exit();
                }
            
        }   /* End Registration() */

        /*  Funtion getName()
        *   Mendapatkan nama user berdasarkan user id.
        */
        public function getName(){

        require("config/database.php");

            if (isset($_SESSION['member_id'])) {

                $user_id = $_SESSION['member_id'];

                $sql = "SELECT firstname, lastname FROM users WHERE user_id = $user_id";
                $query = $db->query($sql);
                $row = $query->fetch_assoc();
                $_SESSION['username'] = $row["firstname"] . " " . $row["lastname"];

            }
        }/* End getName() */

        // IshaveBook function
        /*
        *   Deteksi apakah user sudah memiliki data buku atau belum.
        *   Jika sudah maka Return True
        */
        public function isHaveABook() {

            require("config/database.php");

            $user_id = $_SESSION['user_id'];
            $sql = "SELECT user_id FROM users_book_catalog WHERE user_id = $user_id";
            $query = $db->query($sql);

            if ($query->num_rows) {
                return true;
            } else {
                return false;
            }

        }/* End isHaveABook */

        public function confirmPayment(){
            if (isset($_POST['pay-confirm-button'])) {
                
                $name = $_POST['name'];
                $email = $_POST['email'];
                $date = date("Y,M,D");
                $total = $_POST['total_bayar'];
                $order_id = $_POST['order_id'];
                $tanggal_transaksi = $_POST['tanggal_transaksi'];
                $bank = $_POST["nama_bank"];
                $bukti = $_FILES['bukti']['name'];

                // Proses Upload bukti pembayaran
                $lock_dir = 'assets/uploadsPayment/';
                $lock_file = $lock_dir . basename($_FILES['bukti']['name']);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($lock_file,PATHINFO_EXTENSION));

                $check = getimagesize($_FILES['bukti']['tmp_name']);
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

                if ($_FILES["bukti"]["size"] > 5000000) {
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
                    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $lock_dir)) {
                        copy ("assets/uploadsPayment/". $_FILES['bukti']['name'], "office/assets/uploadsPayment/" . $_FILES['bukti']['name']);
                    }
                }// Upload End
                
                require('config/database.php');
                $sql = "INSERT INTO `user_payment` (`payment_id`, `nama`, `email`, `date`, `jumlah_pembayaran`, `order_id`, `transaction_date`, `bank_name`, `bukti_transaksi`) VALUES (NULL, '$name', '$email', '$date', '$total', '$order_id', '$tanggal_transaksi', '$bank', '$bukti')";
                $query = $db->query($sql);
                if ($query) {
                    header("location: successConfirm.php");
                }

            }
        }

        /*  Check Trial access 
            Cek hak trial pada user
        */
        function Trial(){
            if(!empty($_SESSION["user_id"])){
                $id = $_SESSION["user_id"];

                require("config/database.php");
                $sql = "SELECT * FROM users WHERE user_id = '$id'";
                $execute = $db->query($sql);
                $user = $execute->fetch_assoc();

                if ($user['trial'] == 1) {
                    return true;
                } else {
                    return false;
                }
            }
        }/* End Check Trial Access */ 

    }/* End Class User */

    // Start user!
    $user 		= new User();
?>