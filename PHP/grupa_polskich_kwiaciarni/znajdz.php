<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Znajdź kwiaciarni</h2>
    <form action="znajdz.php" method="POST">
        <p>Podaj nazwę miasta:</p>
        <input type="text" name="miasto" id="miasto">
        <button type="submit">SPRAWDŹ</button>
        <?php
        $db = mysqli_connect("localhost", "root", "", "kwiaciarnia");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["miasto"])) {
            $miasto = $_POST["miasto"];
            $sql = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto'";

            $res = mysqli_query($db, $sql);

            while ($row = mysqli_fetch_array($row)) {
                echo ("<h3>$row[0], $row[1]</h3>");
            }
        }
        mysqli_close($db);
        ?>
    </form>
</body>

</html>