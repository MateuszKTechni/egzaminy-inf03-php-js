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
        <form action="zamow.php" method="post">
            <div id="kontrolki">
                <label for="model">Model:
                    <select name="model" id="model">
                        <?php
                        $connection = mysqli_connect("localhost", "root", "", "obuwie");
                        $query1 = "SELECT model FROM produkt";
                        $result1 = mysqli_query($connection, $query1);
                        while($row = mysqli_fetch_array($result1)){
                            echo "<option value='" . $row['model'] . "'>" . $row['model'] . "</option>";
                        }
                        ?>
                    </select>
                </label>
                <label for="rozmiar">Rozmiar:
                    <select name="rozmiar" id="rozmiar">
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                    </select>
                </label>
                <label for="liczbaPar">Liczba par:
                    <input type="number" id="liczbaPar" name="liczbaPar">
                </label>
                <input type="submit" value="Zamów">
            </div>
        </form>
        <?php
        $query2 = "SELECT buty.model, buty.nazwa, buty.cena, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model;";
        $result2 = mysqli_query($connection, $query2);
        while($row = mysqli_fetch_array($result2)){
            echo "<div class='buty'>";
            echo "<img src='" . $row['nazwa_pliku'] . "' alt='but męski'>";
            echo "<h2>" . $row['nazwa'] . "</h2>";
            echo "<h5>Model: " . $row['model'] . "</h5>";
            echo "<h4>Cena: " . $row['cena'] . " zł</h4>";
            echo "</div>";
        }
        mysqli_close($connection);
        ?>
    </main>
    <footer>
        <p>Autor strony: Mateusz K</p>
    </footer>
</body>
</html>
