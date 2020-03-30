<?php 

session_start();
ini_set('display_errors', 1);
error_reporting( E_ALL | E_STRICT );

require_once("classes/UserClass.php");
require_once("classes/gate.php");

$user = new User();

if($isLoggedIn) {
    header("Location: index.php");
    exit();
}

if (!empty($_GET["trial"]) && $_GET["trial"] == 1) {
    $trial = $_GET["trial"];
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "head.php";?>

<body>

<div class="regis-form">
    <form  action="registration.php" name="registrationform" class="card col-md-5" method="post">
            <div class="form-group">
                <h4>Sign up</h4>
            </div>

            <div class="form-group">
                <input type="hidden" name="trial" value="<?php echo $trial; ?>">
            </div>

            <div class="form-group">
            	<label for="username">First Name</label>
            	<input type="text" name="firstName" placeholder="First Name" class="form-control" autocomplete="off" required autofocus>
            </div>

            <div class="form-group">
            	<label for="username">Last Name</label>
            	<input type="text" name="lastName" placeholder="Last Name" class="form-control" autocomplete="off" required autofocus>
            </div>

            <div class="form-group">
            	<label for="email">E-mail</label>
                <p>
                    *Mohon gunakan email yang vaild. ini berguna untuk kepentingan aktivasi akun anda.
                </p>
            	<input type="email" name="email" id="email" placeholder="Email" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
            	<label for="password">Password</label>
            	<input type="password" name="password" id="password" placeholder="Password" class="input form-control" autocomplete="off" required>
            </div>
            
            <div class="form-group">
            	<label for="password2">Re-enter password</label>
            	<input type="password" name="password2" id="password2" placeholder="Re-enter password" class="input form-control" autocomplete="off" required><br>
            </div>

            <div class="form-group">
                <label for="password2">Second password</label>
                <p>
                    *Fitur ini berguna sebagai alternatif saat password utama anda tidak bisa digunakan karena alasan tertentu.
                </p>
                <input type="password" name="second_password" placeholder="Enter second password" class="input form-control" autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <div class="form-message">
                    <?php if(!empty($_SESSION['message'])): ?>
                    <div class="inner">
                        <?php echo htmlentities($_SESSION['message']) ?>
                        <?php unset($_SESSION['message']); ?>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($_SESSION['SuccessMessage'])): ?>
                    <div class="inner">
                        <?php echo htmlentities($_SESSION['SuccessMessage']) ?>
                        <?php unset($_SESSION['SuccessMessage']); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
                        
            <div class="form-group">
            	<input type="submit" class="btn btn-primary"  name="registration" value="Sign Up" class="btn btn-lg btn-block submit" />  
            </div>

        	<div class="form-group">
        		<div><a href="login.php" style="">Login</a></div>
        	</div>
    </form>  
    <!-- End form -->
</div>  
<!-- End .regis-form -->
</body>
</html>