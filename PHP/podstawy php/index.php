<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <?php
            $zmienna = 20;
            $zmienna *= 5;

            $tab = array(1, 2, 3, 4, 5);

            for ($i = 0; $i < count($tab); $i++) {
                echo ("$tab[$i], ");
            }

            echo ("Wynik to: $zmienna")
            ?>

    <ul>
        <?php
        foreach ($tab as $el) {
            echo ("<li>$el</li>");
        }
        ?>
    </ul> -->

    <form action="index.php" method="post">
        <input type="number" name="a" id="" placeholder="Wprowadz a" required>
        <input type="number" name="b" id="" placeholder="Wprowadz b" required>
        <input type="submit" value="Policz">
    </form>

    <?php
    $db = new mysqli("localhost", "root", "", "zadanie");
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if ($db->connect_error) {
            die("Blad polaczenia");
        }
        $sql = "SELECT a, b, wynik FROM dzielenie";
        $data = $db->query($sql);
        echo ("<ul>");
        while ($row = $data->fetch_assoc()) {
            echo ("<li>" . $row["a"] . "/" . $row["b"] . " = " . $row["wynik"] . "</li>");
        }
        echo ("</ul>");
    } else if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST["a"]) && isset($_POST["b"])) {
            if ($_POST["b"] === 0) {
                echo ("Nie można dzielić przez 0");
            } else {
                $wynik = $_POST["a"] / $_POST["b"];
                echo ("<p>Wynik = $wynik</p>");

                $a = $_POST["a"];
                $b = $_POST["b"];
                $sql = "INSERT INTO dzielenie(a, b, wynik) VALUES($a, $b, $wynik)";
                $db->query($sql);
            }
            echo ("Jestem w POST");
        }
    }
    $db->close();
    ?>
</body>

</html>