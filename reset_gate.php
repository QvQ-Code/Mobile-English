<?php

session_start();
ini_set('display_errors', 0);
error_reporting( E_ALL | E_STRICT );

$key = $_GET["fkey"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html, body {
            margin: 0;
            height: 100%;
        }
        .wrapper {
            width: 50%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .wrapper a {
            text-decoration: none;
            background-color: yellowgreen;
            height: 70px;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .04em;
            box-shadow: 0 0 10px -5px rgba(0,0,0,.7);
            line-height: 70px;
            padding: 0 50px;
            border-radius: 35px;
            transition: all .1s ease;
        }
        .wrapper a:hover {
            box-shadow: 0 0 10px -4px yellowgreen;
            background-image: radial-gradient(#fff,#fff);
            color: black;

        }
        @media (max-width: 892px){
            .container {
                flex-direction:column;
                justify-content: center;
                height: 100vh;
            }
            .wrapper {
                width: 100%;
                height: auto;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    
<div class="container" style="display: flex;">
<div class="wrapper">
        <a href="resetPassword.php?fkey=<?php echo $key; ?>">Reset Primary Password</a>
    </div>
    <div class="wrapper">
        <a href="reset_second_pass.php?fkey=<?php echo $key; ?>">Reset Second Password</a>
    </div>
</div>

</body>
</html>