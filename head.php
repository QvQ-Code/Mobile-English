<?php
    require("config/init.php");

    if (isset($_SESSION["user_id"])) {
        $ssid = session_id();
        $user_id = $_SESSION["user_id"];

        require("classes/db.php");
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
        $execute = $db->query($sql);
        $row = $execute->fetch_assoc();

        if ($ssid !== $row["ssid"]){
            $_SESSION["user_id"] = "";
             session_destroy();
            exit();
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mobile English Robby Lou English e-book">
    <meta name="keywords" content="Ebook, Mobile English, Bahasa Inggris">
    <meta name="author" content="Robby Lou">
    <!-- title -->
    <title>Mobile English | Robby Lou's English e-book</title>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $style_reset; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $style_desktop; ?>">
    <link rel="stylesheet" type="text/css" href="assets/css/custom/m-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom/content-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/parts/slider.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="assets/js/one.js"></script>
    <!-- Data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js" type="text/javascript"></script>
</head>