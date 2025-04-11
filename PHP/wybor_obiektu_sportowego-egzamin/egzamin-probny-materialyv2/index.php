<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Obiekty Sportowe</title>
</head>
<body>
    <section id ="header">
        <a href="index.php">Strona Główna</a>
        <a href="index.php">O nas</a>
        <a href="index.php">Kontakt</a>
    </section>

    <section id ="left">
        <?php
        
        $db = new mysqli("localhost", "root", "", "sport");
        $id = 1;
        if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
        }

        $sqlGetFields = "SELECT * FROM obiektsportowy WHERE id = {$id};";
        $sqlGetFieldsList = "SELECT * FROM obiektsportowy;";
    
        $fieldsData = $db->query($sqlGetFields)->fetch_row();
        $fieldsList = $db->query($sqlGetFieldsList)->fetch_all(MYSQLI_ASSOC);
        ?>
        <main>
            <h2>Lista obiektów sportowych</h2>
                <ol>
                    <?php
                    foreach ($fieldsList as $field) {
                    ?>
                    <ul>
                    <a href="index.php?id=<?php echo ($field["id"]); ?>"><?php echo ($field["nazwa"]) ?></a>
                    </ul>
                    <?php
                    }
                    ?>
                </ol>

    </section>
    <section id = "middle">
            <h2><?php echo ($fieldsData[1]) ?></h2>
            <h3><?php echo ($fieldsData[3]) ?></h3>
            <p><?php echo ($fieldsData[2]) ?></p>
            <img src="<?php echo ($fieldsData[5]) ?>" alt="">
            <p><?php echo ( $fieldsData[4]) ?></p>

    </section>
    <section id ="right">
        <h2>Dodaj nowy obiekt</h2>
        <form action="" method="post">
            Nazwa obiektu: <br>
            <input type="text" name="nazwa" id="nazwa">
            <br>Adres obiektu:<br>
            <input type="text" name="adres" id="adres">
            <br> Rodzaj obiektu:<br>
            <input type="text" name="rodzajobiektu" id="rodzajobiektu">
            <br>Godziny obiektu<br>
            <input type="text" name = "godzinyotwarcia" id="godzinyotwarcia"><br><br>
            <button type = "Submit">Wyslij</button>
        </form>

    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["nazwa"]) && !empty($_POST["adres"]) && !empty($_POST["rodzajobiektu"]) && !empty(["godzinyotwarcia"])) {
            $nazwa = $_POST["nazwa"];
            $adres = $_POST["adres"];
            $rodzajobiektu = $_POST["rodzajobiektu"];
            $zdjecie = $_POST["godzinyotwarcia"];
            $insertSport = "INSERT INTO obiektsportowy (nazwa, adres, rodzajobiektu, godzinyotwarcia) VALUES ('$nazwa', '$adres', '$rodzajobiektu', '$godzinyotwarcia');";
            $db->query($insertSport);
            header("Location: index.php");
        }
    }
    ?>
    </section>

    <footer>
        <p>&copy Mateusz Kowal</p>
    </footer>

    <?php
    $db->close();
    ?>

</body>
</html>