<?php
class Profile {
    function __construct(){
        if(isset($_POST['profile_edit'])){
            $this->profile_edit();    
        }
        if(isset($_POST['password_edit'])){
            $this->password_edit();    
        }
        if(isset($_POST['second_password_edit'])){
            $this->password_edit();    
        }
    }

    function profile_edit(){
        $user = $_SESSION['user_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        require "db.php";
        $sql = "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `kontak` = '$contact' WHERE `user_id` = $user";
        $set = $db->query($sql);
        if($set){
            unset($_POST["profile_edit"]);
            header("location: profile.php");
            exit();
        }
    }

    function password_edit(){
        $user = $_SESSION['user_id'];
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        $new_pass = $_POST['new_pass'];
        $confirm_new_pass = $_POST['confirm_new_pass'];
        $new_pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);;
        var_dump($new_pass, $confirm_new_pass);
        require "db.php";

        $sql = "SELECT password FROM users WHERE user_id = $user";
        $data = $db->query($sql);
        $user_password = $data->fetch_assoc();

        if(password_verify($pass, $user_password["password"])){
            $_SESSION['fail_message'] = "Invalid current password!";
        } else {
            if($new_pass !== $confirm_new_pass){
                $_SESSION['fail_message'] = "New password not match!";
            } else {
                $sql = "UPDATE users SET `password` = '$new_pass_hash'";
                $set = $db->query($sql);
               if($set){
                    unset($_POST);
                    header("location: profile.php");
                    exit();
               }
            }
        }
    }
}
?>