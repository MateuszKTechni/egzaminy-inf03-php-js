<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum milosnikow psow</h1>
    </header>
    <main>
        <section id = "lewy">
            <img src="Avatar.png" alt="Uzytkownik forum">
            <?php
                $connection = mysqli_connect("localhost", "root", "", "forumpsy");
                $query1 = "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta JOIN pytania ON pytania.konta_id = konta.id WHERE pytania.id= 1;";
                $result1 = mysqli_query($connection, $query1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<h4>Użytkownik: " . $row['nick'] . "</h4>";
                    echo "<p>" . $row['postow'] . "</p>";
                    echo "<p>" . $row['pytanie'] . "</p>";
                }
            ?>
            <video controls loop>
                <source src="video.mp4" type="video/mp4">
            </video>
        </section>
        <section id = "prawy">
            <form action="index.php" method = "POST">
                <textarea name="odpowiedz" id="odpowiedz" rows="4" cols = "40" required></textarea><br>
                <button type = "submit" id = "wyslij" name = "wyslij">Dodaj odpowiedz</button>
            </form>
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['odpowiedz'])){
                $odpowiedz = $_POST['odpowiedz'];
                $query2 = "INSERT INTO odpowiedzi (Pytania_id, konta_id, odpowiedz) VALUES (1, 5, '$odpowiedz');";
                $result2 = mysqli_query($connection, $query2);
            }
            ?>
            <h2>
                odpowiedzi na pytania
            </h2>
            <ol>
            <?php
                $query3 = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi JOIN konta ON konta.id = odpowiedzi.konta_id WHERE odpowiedzi.Pytania_id = 1;";
                $result3 = mysqli_query($connection, $query3);
                while($row = mysqli_fetch_assoc($result3)){
                    echo "<li>";
                    echo "<p>" . $row['odpowiedz'] . "</p>";
                    echo "<em>" . $row['nick'] . "</em>";
                    echo "<hr>";
                    echo "</li>";
                }
            mysqli_close($connection);
            ?>
            </ol>
        </section>
    </main>
    <footer>
        <p>Autor: Mateusz K <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a></p>
    </footer>
</body>
</html>