<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>

    <form action="zadphp.php" method="post">
        <input type="text" name="input" placeholder="username" required>
        <input type="submit" value="Send">
    </form>

    <?php
    if (isset($_POST['input'])) {
        $user = $_POST["input"];
        echo ("Witaj: " . $user);
    }
    ?>
</body>

</html>