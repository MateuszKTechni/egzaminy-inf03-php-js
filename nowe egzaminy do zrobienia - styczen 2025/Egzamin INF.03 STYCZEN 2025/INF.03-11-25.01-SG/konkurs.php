<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header><h1>KONKURS - WOLONTARIAT SZKOLNY</h1></header>
    <main>
        <section id="lewy">
            <h3>Konkursowe nagrody</h3>
            <form action="konkurs.php" method="POST">
                <input type="submit" value="Losuj nowe nagrody">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Nr</th>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Wartość</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $connection = mysqli_connect("localhost", "root", "", "konkurs");
                        $query = "SELECT nagrody.nazwa, nagrody.opis, nagrody.cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                        $result = mysqli_query($connection, $query);
                        $lw = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $lw . "</td>";
                            echo "<td>" . $row['nazwa'] . "</td>";
                            echo "<td>" . $row['opis'] . "</td>";
                            echo "<td>" . $row['cena'] . " zł</td>";
                            echo "</tr>";
                            $lw++;
                        }
                        mysqli_close($connection);
                    ?>
                </tbody>
            </table>
        </section>
        <section id="prawy">
            <img src="puchar.png" alt="Puchar dla wolontariusza">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kwerenda1.png">Kwerenda1</a></li>
                <li><a href="kwerenda2.png">Kwerenda2</a></li>
                <li><a href="kwerenda3.png">Kwerenda3</a></li>
                <li><a href="kwerenda4.png">Kwerenda4</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: Mateusz K.</p> </footer>
</body>
</html>