<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><em>KupAuto! </em>Internetowy Komis Samochodowy</h1>
    </header>
    <main>
        <section id = "st">
            <?php
                $connection = mysqli_connect("localhost", "root", "", "kupauto");
                $query1 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;";
                $result1 = mysqli_query($connection, $query1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<img src='$row[zdjecie]'  alt='oferta dnia'>";
                    echo "<h4>Oferta dnia: Toyota" . $row['model'] . "</h4>";
                    echo "<p>Rocznik: " . $row['rocznik'] . " przebieg: " . $row['przebieg'] . " paliwo: " . $row['paliwo'] . "</p>";
                    echo "<h4>Cena: " .  $row['cena']  . "</h4>";
                }
            ?>
        </section>
        <section id = "nd">
            <h2>Oferty Wyróżnione</h2>
            <?php
                echo "<div class='oferty-container'>";
                $query2 = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM marki JOIN samochody ON marki.id = samochody.marki_id WHERE samochody.wyrozniony = 1;";
                $result2 = mysqli_query($connection, $query2);
                while($row = mysqli_fetch_assoc($result2)){
                    echo "<div class='generated'>";
                    echo "<img src='{$row['zdjecie']}' alt='{$row['model']}'>";
                    echo "<h4>{$row['nazwa']} {$row['model']}</h4>";
                    echo "<p>Rocznik: {$row['rocznik']}</p>";
                    echo "<h4>Cena: {$row['cena']}</h4>";
                    echo "</div>";
                }
                echo "</div>";
            ?>
        </section>
        <section id = "rd">
            <h2>Wybierz marke</h2>
            <form action="KupAuto.php" method="post">
                <select name = "marka">
                <?php
                    $query3 = "SELECT marki.nazwa FROM marki;";
                    $result3 = mysqli_query($connection, $query3);
                    while($row = mysqli_fetch_assoc($result3)){
                        echo "<option value = '{$row['nazwa']}'>{$row['nazwa']}</option>";
                    }
                ?>
                </select>
                <button type="submit" id = "wybor">Wyszukaj</button>
                </form>
            <?php
            if (isset($_POST['marka'])) {
                $wybor = $_POST['marka'];
                    echo "<div class='oferty-container'>";
                    $query4 = "SELECT marki.nazwa, samochody.model, samochody.cena, samochody.zdjecie 
                    FROM samochody 
                    JOIN marki ON marki.id = samochody.marki_id 
                    WHERE marki.nazwa = '$wybor';";
                    $result4 = mysqli_query($connection, $query4);
                    while($row = mysqli_fetch_assoc($result4)){
                        echo "<div class = 'generated'>";
                        echo "<img src='{$row['zdjecie']}' alt='{$row['model']}'>";
                        echo "<h4>{$row['nazwa']} {$row['model']}</h4>";
                        echo "<h4>Cena: {$row['cena']}</h4>";
                        echo "</div>";
                    }
                    echo "</div>";
                }

            mysqli_close($connection)
            ?>
        </section>
    </main>
    <footer>
        <p>Strone wykonal:Mateusz K</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>