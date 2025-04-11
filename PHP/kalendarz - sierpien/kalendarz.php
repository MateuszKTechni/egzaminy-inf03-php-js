<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Zadania na lipiec</title>
</head>

<body>
    <header>
        <section id="banner1">
            <img src="logo1.png" alt="lipiec">
        </section>
        <section id="banner2">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania:
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET") {

                    $db = mysqli_connect("localhost", "root", "", "terminarz");

                    if (!$db) {
                        die("Blad: " . mysqli_connect_error());
                    }

                    $query = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN '2020-07-01' AND '2020-07-07'";
                    $result = mysqli_query($db, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0];";
                        }
                    }

                    mysqli_close($db);
                }
                ?>
            </p>
    </header>
    </section>
    <main>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            $db = mysqli_connect("localhost", "root", "", "terminarz");

            if (!$db) {
                die("Blad: " . mysqli_connect_error());
            }

            $query = "SELECT dataZadania, wpis FROM zadania WHERE MONTH(dataZadania) = 7 GROUP BY dataZadania ASC";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<section class='kalendarz'>
                <h6>$row[0]</h6>
                <p>$row[1]</p>
                </section>";
            }
            mysqli_close($db);
        }
        ?>
    </main>
    <section id="stopka">
        <a href="sierpien.html" target="_blank">Terminarz na sierpien</a>
        <p>Stronr wykonal: Mateusz Kowal</p>
    </section>
</body>

</html>