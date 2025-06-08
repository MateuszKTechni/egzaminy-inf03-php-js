<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w ksiazkowicach duzych</h1>
    </header>
    <main>
        <aside id = "lewy">
            <h3>Polecane dziela autorow</h3>
            <ol>
            <?php
                $connection = mysqli_connect("localhost", "root", "", "biblioteka");
                $query1 = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko ASC;";
                $result1 = mysqli_query($connection, $query1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<li>" . $row['imie'] . $row['nazwisko'] . "</li>";
                }
            ?>
            </ol>
        </aside>
        <section id = "srodek">
            <h3>ul. Czytelnicza25,&nbsp;ksiazkowice wielkie</h3>
            <a href="mailto:sekretariat@biblioteka.pl"><p>Napisz do nas</p></a>
            <img src="biblioteka1.png" alt="książki">
        </section>
        <section id = "prawe">
            <section id = "prawy1">
                <h3>Dodaj czytelnika</h3>
                <form action="biblioteka.php" method="post">
                    <label for="imie">Imie:
                        <input type="text" name = "imie" id = "imie" required>
                    </label><br>
                    <label for="nazwisko">Nazwisko:
                        <input type="text" name = "nazwisko" id = "nazwisko" required>
                    </label><br>
                    <label for="symbol">Symbol:
                        <input type="number" id = "symbol" name = "symbol">
                    </label><br>
                    <button type = "submit" id = "dodaj">Dodaj</button>
                </form>
            </section>
            <section id = "prawy2">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['symbol'])){
                        
                        $imie = $_POST['imie'];
                        $nazwisko = $_POST['nazwisko'];
                        $symbol = $_POST['symbol'];
                        
                        $query2 = "INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('$imie', '$nazwisko', '$symbol');";
                        $result2 = mysqli_query($connection, $query2);
                        if($result2){
                            echo "Czytelnik " . $imie . " " . $nazwisko . " został(a) dodany do bazy";
                        }else{
                            echo "Blad podczas dodawania do bazy";
                        }
                    }
                
                mysqli_close($connection)
                ?>
            </section>
        </section>
    </main>
    <footer>
        <p>Projekt strony: Matusz K</p>
    </footer>
</body>
</html>