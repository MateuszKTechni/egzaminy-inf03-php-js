<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1>Hodowla swinek morskich - zamow swinkowe maluszki</h1></header>
   <main>
    <nav>
        <a href="peruwianka.php">rasa peruwianka</a>
        <a href="american.php">rasa american</a>
        <a href="crested.php">rasa crested</a>
    </nav>
    <aside>
    <h3>Poznaj wszystkie rasy świnek morskich</h3>
    <ol>
        <?php
            $db_conn = mysqli_connect("localhost", "root",  "",  "hodowala");

            if($db_conn->connect_error){
                die("connection died" . $db_conn->connect_error);
            }
            $query1 = "SELECT rasy FROM rasy";
            $result1 = mysqli_query($db_conn, $query1);
            while($row = mysqli_fetch_array($result1)){
                echo"<li>$row[0]</li>";
            }
        ?>
    </ol>
    </aside>

        <img src="american.jpg" alt="Świnka morska rasy american">
        <?php
        $query2 = "SELECT DISTINCT s.data_ur, s.miot, r.rasy from swinki s JOIN rasy r on s.rasy_id = r.id WHERE r.id = 6";
        $result2 = mysqli_query($db_conn, $query2);
        while($row = mysqli_fetch_array($result2)){
            echo "<h2>Rasa: $row[2]</h2>";
            echo "<p> Data urodzenia: $row[0] </p>";
            echo "<p>Rasa: $row[1]<p>";
        }
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
            <?php
            $query3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6";
            $result3 = mysqli_query($db_conn, $query3);
            while ($row = mysqli_fetch_array($result3)) {
                echo "<h3>$row[0] - $row[1] zł</h3>";
                echo "<p>$row[2]</p>";
            }
            mysqli_close($db_conn);
            ?>
    </section>
    </main>
    <footer>Strone wykonal: Mateusz Kowal</footer>
</body>
</html>