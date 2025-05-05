<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $connect = mysqli_connect("localhost", "root", "", "wydarzenia");
        $query = "SELECT * FROM eventy ORDER BY eventy.data LIMIT 1;";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result)){
            echo '<img src="' . $event["zdjecie"] . '" alt="' . $event["tytul"] . '" width="300"><br>';
            echo '<h4>Wydarzenie dnia: ' . $event["tytul"] . '</h4>';
            echo 'Data: ' . $event["data"] . ' | Miejsce: ' . $event["miejsce"] . '<br>';
            echo '<p>' . $event["opis"] . '</p>';
            echo 'Cena: ' . $event["cena"] . ' zł';

        mysqli_close($connect);
        }
    ?>
</body>
</html>