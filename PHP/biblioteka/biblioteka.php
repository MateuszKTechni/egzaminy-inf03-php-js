<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="banner">
        <h1>Biblioteka w Książkowicach Małych</h1>
    </section>
    <section id="left-panel">
        <h4>Dodaj czytelnika</h4>
        <label for="name">imię:</label>
        <input type="text" id="name" name="name"><br>
        <label for="surname">nazwisko:</label>
        <input type="text" id="surname" name="surname"><br>
        <label for="symbol">symbol:</label>
        <input type="number" id="symbol" name="symbol"><br>
        <button type="submit">AKCEPTUJ</button>

        <?php
        $db = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['symbol'])) {
            echo ("Dodano czytelnika" . $_POST['imie'] . " " . $_POST['nazwisko'] . " " . $_POST['kod']);

            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $kod = $_POST['kod'];
            $sql = "INSERT INTO czytelnicy(imie, nazwisko, kod  ) VALUES ($imie, $nazwisko, $kod)";
        }
        ?>
    </section>
    <section id="center-panel">
        <img src="biblioteka.png" alt="biblioteka">
        <h6>ul.Czytelników 15; Książkowice Małe</h6>
        <p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
    </section>
    <section id="right-panel">
        <h4>Nasi czytelnicy:</h4>
        <ol>
            <?php
            $sql = "SELECT imie, nazwisko FROM czytelnicy ORDER BY nazwisko ASC";
            $result = mysqli_query($db, $sql);

            while ($row = mysqli_fetch_array($result)) {
                echo ("<li>$row[0] $row[1]</li>");
            }
            mysqli_close($db);
            ?>
        </ol>
    </section>
    <section id="footer">
        <p>Projekt witryny: 00000000000</p>
    </section>
</body>

</html>