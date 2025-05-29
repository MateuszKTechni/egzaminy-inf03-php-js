<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Kolo szachowe <em>gambit piona</em></h2>
    </header>
    <main>
    <section id = "lewy">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="kw.txt">kwerenda 1</a></li>
            <li><a href="kw.txt">kwerenda 1</a></li>
            <li><a href="kw.txt">kwerenda 1</a></li>
            <li><a href="kw.txt">kwerenda 1</a></li>    
        </ul>
        <img src="logo.png" alt="Logo koła">
    </section>
    <section id = "prawy">
        <h3>Najlepsi gracze naszego koła</h3>
        <table>
            <thead>
                <tr>
                    <th>Pozycja</th>
                    <th>Pseudonim</th>
                    <th>Tytuł</th>
                    <th>Ranking</th>
                    <th>Klasa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $connection = mysqli_connect("localhost", "root", "", "szachy");
                    $query1 = "SELECT zawodnicy.pseudonim, zawodnicy.tytul, zawodnicy.ranking, zawodnicy.klasa FROM zawodnicy WHERE zawodnicy.ranking > 2787 ORDER BY zawodnicy.ranking DESC;";
                    $result1 = mysqli_query($connection, $query1);
                    $lp = 1;
                    while($row = mysqli_fetch_assoc($result1)){
                        echo "<tr>";
                        echo "<td>" . $lp . "</td>";
                        echo "<td>" . $row['pseudonim'] . "</td>";          
                        echo "<td>" . $row['tytul'] . "</td>";          
                        echo "<td>" . $row['ranking'] . "</td>";
                        echo "<td>" . $row['klasa'] . "</td>";
                        echo "</tr>";
                        $lp++;
                    }
                ?>
            </tbody>
        </table>
            <form action="szachy.php" method="get">
                <input type="submit" value = "Losuj nowa pare graczy">
            </form>
            <?php
                $query2 = "SELECT zawodnicy.klasa, zawodnicy.pseudonim FROM zawodnicy ORDER BY RAND() LIMIT 2";
                $result2 = mysqli_query($connection, $query2);
                while($row = mysqli_fetch_assoc($result2)){
                    echo "<h4>" . $row['klasa'] . " " . $row['pseudonim'] . "</h4>";
                }
            mysqli_close($connection);
            ?>
            <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </section>
    </main>
    <footer>
        <p>Strone wykonal: Mateusz K</p>
    </footer>
</body>
</html>