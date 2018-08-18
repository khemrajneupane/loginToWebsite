<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup page </title>
    <link rel = "stylesheet" type = "text/css" href = "login.css">
</head>
<body>
<header>
    <nav>
        <div class = "main-wrapper">
            <ul>
                <li><a href = "index.php">Home</a></li>
            </ul>
        <div class = "nav-login">
        <form action = "login.php" method = "POST">
            <input type = "text" name = "uid" placeholder  = "username ">
            <input type = "password" name = "pwd" placeholder  = "password ">
            <button type  = "submit" name = "submit">Login</button>
        </form>
            <a href = "signup.php">Sign up</a>
        </div>
    </div>
    </nav>
</header>
</body>
</html>