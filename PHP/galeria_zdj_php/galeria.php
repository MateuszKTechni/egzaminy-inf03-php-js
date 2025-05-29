<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Galeria</title>
</head>
<body>
    <header><h1>Zdjecia</h1></header>
    <main>
        <section id="left">
            <h2>Tematy zdjec</h2>
            <ul>
                <li>Zwierzeta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ul>
        </section>
        <section id="middle">
            <?php
            $connect = mysqli_connect("localhost", "root", "", "galeria");
            $query1 = "SELECT plik, tytul, polubienia, imie, nazwisko FROM zdjecia JOIN autorzy ON zdjecia.autorzy_id = autorzy.id ORDER BY nazwisko";
            $result1 = mysqli_query($connect, $query1);
            while($row = mysqli_fetch_array($result1)){
                echo"<div class = 'blok'>";
                echo"<img src = '$row[0]' alt = 'zdjecie'>";
                echo"<h3>$row[1]</h3>";
                if($row[2] > 40){
                    echo"<p>Autor $row[3] $row[4]. <br> Wiele osob polubilo ten obraz.</p>";
                }else{
                    echo"<p>Autor $row[3] $row[4]";
                }
                echo"<a href = '$row[0]' download> Pobierz</a>";
                echo "</div>";
            };
            ?>
        </section>
        <section id="right">
            <h2>Najbardziej lubiane</h2>
            <?php
            $query2 = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100";
            $result2 = mysqli_query($connect, $query2);
            while ($row = mysqli_fetch_array($result2)) {
                echo "<img src='$row[1]' alt='$row[0]'>";
            }

            mysqli_close($connect);
            ?>
           <strong>Zobacz wszystkie nasze zdjecia</strong>
        </section>
    </main>
    <footer><h5>Strone wykonał: Mateusz Kowal</h5></footer>
</body>
</html>