<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
    <?php
        header("Refresh: 10");
    ?>
</head>
<body>
    <header>
        <section id = header1>
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section id = header2>
            <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <main>
        <section id = "left">
            <h2>Lokalizacje wag</h2>
            <?php
                $connect = mysqli_connect('localhost', 'root', '', 'wazenietirow');
                $query1 = "SELECT ulica FROM lokalizacje";
                $result1 = mysqli_query($connect, $query1);
                echo "<ol>";
                while ($row = mysqli_fetch_array($result1)) {
                    echo "<li>" . $row['ulica'] . "</li>";
                }
                echo "</ol>";//nie mam pojecia dlaczego nie zwraca mi listy ponumerowanej
            ?>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <section id = "middle">
            <h2>Alerty</h2>
            <table>
                <thead>
                    <tr>
                        <th>rejestracja</th>
                        <th>ulica</th>
                        <th>waga</th>
                        <th>dzien</th>
                        <th>czas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query2 = "SELECT w.rejestracja, l.ulica, w.waga, w.dzien, w.czas FROM wagi w JOIN lokalizacje l ON w.lokalizacje_id = l.id WHERE w.waga > 5;";
                        $result2 = mysqli_query($connect, $query2);
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo "<tr>";
                            echo "<td>" . $row['rejestracja'] . "</td>";
                            echo "<td>" . $row['ulica'] . "</td>";
                            echo "<td>" . $row['waga'] . "</td>";
                            echo "<td>" . $row['dzien'] . "</td>";
                            echo "<td>" . $row['czas'] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <section id = "right">
            <img src="obraz2.png" alt="tir">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Mateusz K</p>
    </footer>
    <?php
        mysqli_close($connect);
    ?>
</body>
</html>