<header id="Header">
<?php 

if (!isset($_SESSION)) {session_start();}

if (isset($_SESSION["user_id"])) {
    $UID = $_SESSION["user_id"];
    $data_header = "SELECT * FROM users_order WHERE User_id = $UID AND Status = 'on-hold'";
    $header = $db->query($data_header);
    $_SESSION["order_count"] = mysqli_num_rows($header);  
}

?>
    <div class="brand">
      <a class="logo" href="index.php">
          <img src="assets/images/new_logo.png">
          <div></div>
      </a>
    </div>

    <nav class="desktop-nav">
      <ul>
        
        <li><a href="index.php">Home</a></li>
        <!--li><a href="#">Course</a></li -->
        <li><a href="news.php">News</a></li>
        <!-- li><a href="blog.php">Blog</a></li -->
        <li><a href="about.php">About</a></li>
        <li><abbr title="Robby Lou's Learners English-Indonesian Dictionary | The Dictionary that teaches grammar"><a href="http://www.robbylou.com/home" target="_blank">robbylou.com</a></abbr></li>

        <?php if (!empty(@$_SESSION['user_id']) || !empty($_COOKIE["member_login"])): ?>
        
        <!-- li><a href="profile.php">Profile</a></li -->    
        <li>
            <a style="position: relative;" href="orders.php">
                Orders
            <?php 
                if (isset($_SESSION["order_count"]) AND $_SESSION["order_count"] > 0) {
            ?>
                <div class="header_item_notif">
            <?php 
                    echo $_SESSION["order_count"]; 
            ?>
                </div>
            <?php
                }
            ?>
            </a>
        </li>
        <li><a id="Logout_button" style="color:red" href="logout.php">Logout</a></li>

        <?php else : ?>

        <li><a class="signInBtn" href="login.php">Sign in</a></li>
        <li><a class="signUpBtn" href="registration.php">Sign up</a></li>
      
        <?php endif; ?>

      </ul>
    </nav>
    <!-- End .desktop-nav -->

    <nav id="Mobile-nav">

      <!-- overlay open button -->
      <div class="open-nav" onclick="openNav()">
        <i class="material-icons">
          menu
        </i>
      </div>

      <ul id="Overlay" class="overlay">

        <!-- overlay close btn -->
        <div onclick="closeNav()">&times;</div>

        <li><a href="index.php">Home</a></li>
        <!-- li><a href="#">Course</a></li -->
        <li><a href="news.php">News</a></li>
        <!-- li><a href="blog.php">Blog</a></li -->
        <li><a href="about.php">About</a></li>
        <li><abbr title="Robby Lou's Learners English-Indonesian Dictionary | The Dictionary that teaches grammar"><a href="http://www.robbylou.com/home" target="_blank">Robbylou.com</a></abbr></li>

        <?php if (!empty(@$_SESSION['user_id']) || !empty($_COOKIE["member_login"])): ?>
      
        <li><a href="profile.php">Profile</a></li>    
        <li>
            <a style="position: relative;" href="orders.php">
                Orders
            <?php 
                if (isset($_SESSION["order_count"]) AND $_SESSION["order_count"] > 0) {
            ?>
                <div class="header_item_notif">
            <?php 
                    echo $_SESSION["order_count"]; 
            ?>
                </div>
            <?php
                }
            ?>
            </a>
        </li>
        <li><a href="logout.php">Logout</a></li>

        <?php else : ?>

        <li><a href="login.php">Login</a></li>
        <li><a href="registration.php">Signup</a></li>
      
        <?php endif; ?>

      </ul>
    </nav>
    <!-- End #Mobile-nav -->

</header>
<!-- End #Header -->

