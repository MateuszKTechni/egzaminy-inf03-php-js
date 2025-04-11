<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Lista Szkół</h1>
    </header>

    <?php
    $db = new mysqli("localhost", "root", "", "szkoła");

    $id = 1;
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
        $id = $_GET["id"];
    }

    $sqlGetSchool = "SELECT * FROM szkoła WHERE id = {$id};";
    $sqlGetSchoolsList = "SELECT * FROM szkoła;";

    $schoolData = $db->query($sqlGetSchool)->fetch_row();
    $schoolList = $db->query($sqlGetSchoolsList)->fetch_all(MYSQLI_ASSOC);
    ?>
    <main>
        <div class="main">
            <h2>Szkoły</h2>
            <ol>
                <?php
                foreach ($schoolList as $school) {
                ?>
                    <li>
                        <a href="index.php?id=<?php echo ($school["id"]); ?>"><?php echo ($school["nazwa"]) ?></a>
                    </li>
                <?php
                }
                ?>
            </ol>
        </div>
        <div class="main center">
            <h2><?php echo ($schoolData[1]) ?></h2>
            <img src="<?php echo ($schoolData[3]) ?>" alt="">
            <p><?php echo ($schoolData[4]) ?></p>
            <p><?php echo ($schoolData[2]) ?></p>
        </div>
        <div class="main right">
            <h2>Dodaj szkołe</h2>
            <form action="" method="POST">
                <input type="text" name="nazwa" id="" placeholder="Nazwa">
                <input type="text" name="adres" id="" placeholder="Adres">
                <input type="text" name="zdjecie" id="" placeholder="Link do zdjęcia">
                <input type="text" name="opis" id="" placeholder="Opis">
                <button type="submit">Dodaj</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["nazwa"]) && !empty($_POST["adres"]) && !empty($_POST["opis"]) && !empty(["zdjecie"])) {
                    $nazwa = $_POST["nazwa"];
                    $adres = $_POST["adres"];
                    $opis = $_POST["opis"];
                    $zdjecie = $_POST["zdjecie"];
                    $insertSchool = "INSERT INTO szkoła (nazwa, adres, opis, zdjecie) VALUES ('$nazwa', '$adres', '$opis', '$zdjecie');";
                    $db->query($insertSchool);
                    header("Location: index.php");
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000</p>
    </footer>

    <?php
    $db->close();
    ?>
</body>

</html>