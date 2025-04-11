<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cookies form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_login']) && isset($_POST['user_passwd'])) {
        if ($_POST['user_login'] == "mati" && $_POST['user_passwd'] == "passwd") {
            setcookie("login", time(), time() + 60, "/");
        } else {
            echo ("wrong username or password");
        }
    }
    ?>

    <?php
    if (!isset($_COOKIE['login'])) {
    ?>
        <form action="" method="post">
            <input type="text" name="user_login" id="user_login" placeholder="Login" required>
            <input type="password" name="user_passwd" , id="user_passwd" placeholder="Password" required>

            <input type="submit" value="Enter">
        </form>

    <?php
    } else {
        echo ("You are successfully logged in");
    }
    ?>
</body>

</html>