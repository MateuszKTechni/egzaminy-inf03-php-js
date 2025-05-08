<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="fav.png" type="image/x-icon">
</head>
<body>
    <main>
        <header>
            <img src="banner.jpg" alt="Polska">
        </header>

        <section class="container">
            <section id="left">
                <section id="left1">
                    <h4>Podaj początek nazwy miasta</h4>
                    <form method="POST" action="index.php">
                        <input type="text" name="miasto" required>
                        <input type="submit" value="Szukaj">
                    </form>
                </section>

                <section id="left2">
                    <p>Egzamin INF.03</p>
                    <p>Autor: Mateusz K</p>
                </section>
            </section>

            <section id="right">
                <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>

                <?php
                if (isset($_POST['miasto'])) {
                    $filter = htmlspecialchars(trim($_POST['miasto']));
                    echo "<p id='filtr'>{$filter}</p>";

                    $connection = mysqli_connect("localhost", "root", "", "wykaz");

                    $user_filter = mysqli_real_escape_string($connection, $filter);
                    $query = "SELECT miasta.nazwa, wojewodztwa.nazwa AS wojewodztwo 
                              FROM miasta 
                              JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id 
                              WHERE miasta.nazwa LIKE '$user_filter%' 
                              ORDER BY miasta.nazwa ASC";

                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>Miasto</th><th>Województwo</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>{$row['nazwa']}</td><td>{$row['wojewodztwo']}</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>Nie znaleziono miasta.</p>";
                    }

                    mysqli_close($connection);
                }
                ?>
            </section>
        </section>
    </main>
</body>
</html>
