<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "container"> 
    <?php
        $connect = mysqli_connect("localhost", "root", "", "wydarzenia");
        $query = "SELECT * FROM eventy JOIN kategorie ON eventy.id_kategorii = kategorie.id;";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result)){
            echo '<div class="event">';
            echo '<img src="' . $row["zdjecie"] . '" alt="' . $row["tytul"] . '">';
            echo '<h3>' . $row["tytul"] . '</h3>';
            echo '<p><strong>Kategoria:</strong> ' . $row["nazwa"] . '</p>';
            echo '<p><strong>Data:</strong> ' . $row["data"] . '</p>';
            echo '<p><strong>Miejsce:</strong> ' . $row["miejsce"] . '</p>';
            echo '<p><strong>Cena:</strong> ' . $row["cena"] . ' zł</p>';
            echo '</div>';
    }
    ?>
    </div>
</body>
</html>