<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Obuwie</title>
</head>
<body>
    <header>
        <h1>Obuwie meskie</h1>
    </header>
    <main>
       <h2>Zamówienie</h2>
       <?php
            $model = $_POST['model'];
            $rozmiar = $_POST['rozmiar'];    
            $liczbaPar = $_POST['liczbaPar'];

            $connection = mysqli_connect("localhost", "root", "", "obuwie");
            $query3 = "SELECT buty.nazwa, buty.cena, produkt.kolor, produkt.kod_produktu, produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model WHERE buty.model = '$model'";
            $result3 = mysqli_query($connection, $query3);
            if($result3 && mysqli_num_rows($result3) > 0){
                $row = mysqli_fetch_array($result3);

                $nazwa = $row['nazwa'];
                $cena = $row['cena'];
                $kolor = $row['kolor'];
                $material = $row['material'];
                $nazwa_pliku = $row['nazwa_pliku'];

                $wartoscZamowienia = $liczbaPar * $cena;

                echo "<div class='zamowienie'>";
                echo '<img src="'. $nazwa_pliku . '" alt="but męski">';
                echo '<h2>' . $nazwa . '</h2>';
                echo '<p>Cena za ' . $liczbaPar . ' par: ' . $wartoscZamowienia . ' zł</p>';
                echo '<p>Szczegóły produktu: ' . $kolor . ', ' . $material . '</p>';
                echo '<p>Rozmiar: ' . $rozmiar . '</p>';
                echo "</div>";
            } else {
                echo "<p>Nie znaleziono produktu o podanym modelu.</p>";
            }
            mysqli_close($connection);
       ?>
       <a href="index.php">Strona główna</a>
    </main>
    <footer>
        <p>Autor strony: Mateusz K</p>
    </footer>
</body>
</html>
