<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formularz filtrowania po kategorii</h2>
    <form action="skrypt4.php" method="get">
    <label for="kategoria">Wybierz kategorię:</label>
        <select name="kategoria_id" id="kategoria">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "wydarzenia");
            $query = "SELECT * FROM kategorie";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row["id"] . '">' . $row["nazwa"] . '</option>';
            }
            mysqli_close($conn);
            ?>
        </select>
        <input type="submit" value="Filtruj">
    </form>
</body>
</html>