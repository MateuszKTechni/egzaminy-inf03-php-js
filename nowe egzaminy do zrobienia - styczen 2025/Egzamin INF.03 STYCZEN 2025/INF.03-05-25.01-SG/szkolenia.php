<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="container">
        <header>
            <img src="baner.jpg" alt="Szkolenia">
        </header>

        <div class="content">
            <nav>
                <ul>
                    <li><a href="index.html">Strona główna</a></li>
                    <li><a href="szkolenia.php">Szkolenia</a></li>
                </ul>
            </nav>
            <main>
            <?php
                $connection = mysqli_connect("localhost", "root", "", "firma");
                $query = "SELECT szkolenia.Data, szkolenia.Temat FROM szkolenia ORDER BY szkolenia.Data ASC";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                    $file = fopen("harmonogram.txt", "w");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $linia = $row['Data'] . " " . $row['Temat'] . "\n";
                        fwrite($file, $linia);
                        echo "<p>" . $row['Data'] . " " . $row['Temat'] . "</p>";
                        echo "<br>";
                    }

                    fclose($file);
                } else {
                    echo "<p>Brak szkoleń w bazie danych.</p>";
                }

                mysqli_close($connection);
                ?>
            </main>
        </div>

        <footer>
            <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: Mateusz K</p> 
        </footer>
    </section>
</body>
</html>
