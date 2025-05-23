<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <header>
        <section id="baner_1">
            <h1>Organizer: SIERPIEŃ</h1>
        </section>
        <section id="baner_2">
            <form action="organizer.php" method="post">
                <label>Zapisz wydarzenie:
                    <input type="text" name="wpis" />
                </label>
                <button name="submit">OK</button>
            </form>
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'kalendarz');
            if (isset($_POST['submit'])) {
                $wpis = $_POST['wpis'];
                $query = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-09'";
                mysqli_query($connection, $query);
            }
            ?>
        </section>
        <section id="baner_3">
            <img src="logo2.png" alt="sierpień" />
        </section>
    </header>
    <main>
        <?php
        $query = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'sierpien'";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo "<section class='dzien'>
                    <h5>$row[0]</h5>
                    <p>$row[1]</p>
                </section>";
        }
        mysqli_close($connection);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: Mateusz K</p>
    </footer>
</body>

</html>