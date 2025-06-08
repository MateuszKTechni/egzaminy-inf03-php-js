<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl">
    
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>

    <main>
        <section id="lewy">
            <h2>Gdzie pojechać?</h2>
            <?php
            $connection = mysqli_connect("localhost", "root", "", "motory");
            $query1 = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
            $result1 = mysqli_query($connection, $query1);

            echo "<dl>";
            while($row = mysqli_fetch_assoc($result1)){
                echo '<dt>' . $row['nazwa'] . ', rozpoczyna się w ' . $row['poczatek'] .
                     ' <a href="' . $row['zrodlo'] . '">zobacz zdjęcie</a></dt>';
                echo '<dd>' . $row['opis'] . '</dd>';
            }
            echo "</dl>";
            ?>
        </section>

        <section id="prawe">
            <section id="prawy1">
                <h2>Co kupić?</h2>
                <ol>
                    <li>Honda CBR125R</li>
                    <li>Yamaha YBR125</li>
                    <li>Honda VFR800i</li>
                    <li>Honda CBR1100XX</li>
                    <li>BMW R1200GS LC</li>
                </ol>
            </section>

            <section id="prawy2">
                <h2>Statystyki</h2>
                <?php
                $query2 = "SELECT COUNT(wycieczki.id) AS liczba FROM wycieczki;";
                $result2 = mysqli_query($connection, $query2);
                $row = mysqli_fetch_assoc($result2);
                echo '<p>Wpisanych wycieczek: ' . $row['liczba'] . '</p>';
                mysqli_close($connection);
                ?>
                <p>Użytkowników forum: 200</p>
                <p>Przesłanych zdjęć: 1300</p>
            </section>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: Mateusz Kowal</p>
    </footer>
</body>
</html>
