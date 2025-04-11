<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'wedkowanie');

    if (!$db) {
        die("Blad polaczenia bazy");
    }
    $imie = $_POST['imie'];
    $adres = $_POST['adres'];
    $nazwisko = $_POST['nazwisko'];

    $query  = "INSERT INTO wedkowanie (imie, adres, nazwisko, data_zezwolenia, punkty) VALUES ($imie, $adres, $nazwisko, NULL, NULL)";

    if (mysqli_query($db, $query)) {
        echo ("Dane zostaly zapisane poprawnie");
    } else {
        echo ("Blad zapisywania danych");
    }

    $db->close();
    ?>
</body>

</html>