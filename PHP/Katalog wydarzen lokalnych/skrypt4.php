<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "container"> 
    <?php
    $kategoria_id = $_GET['kategoria_id'] ?? null;
    if ($kategoria_id) {
        $conn = mysqli_connect("localhost", "root", "", "wydarzenia");
        $query = "SELECT * FROM eventy JOIN kategorie ON eventy.id_kategorii = kategorie.id WHERE kategorie.id = $kategoria_id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo '<div class="container">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="event">';
                echo '<img src="' . $row["zdjecie"] . '" alt="' . $row["tytul"] . '">';
                echo '<h3>' . $row["tytul"] . '</h3>';
                echo '<p><strong>Kategoria:</strong> ' . $row["nazwa"] . '</p>';
                echo '<p><strong>Data:</strong> ' . $row["data"] . '</p>';
                echo '<p><strong>Miejsce:</strong> ' . $row["miejsce"] . '</p>';
                echo '<p><strong>Cena:</strong> ' . $row["cena"] . ' zł</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {   
            echo 'Nie znaleziono wydarzeń w tej kategorii.';
        }
        mysqli_close($conn);
    } else {
        echo 'Brak wybranej kategorii.';
    }
    ?>
    </div>
</body>
</html>
