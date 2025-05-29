<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header><h1>Klub zdobywców gór Polskich</h1></header>
    <nav>
        <a href="kw.txt">kwerenda 1</a>
        <a href="kw.txt">kwerenda 2</a>
        <a href="kw.txt">kwerenda 3</a>
        <a href="kw.txt">kwerenda 4</a>
    </nav>
    <main>
    <section id = "lewy">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>
    <section id = "prawy">
        <h2>Dołącz do naszego zespołu</h2>
        <p>Wpisz swoje dane do formularza</p>
        <form action="zdobywcy.php" method="post">
            <label for="Nazwisko">Nazwisko:
                <input type="text" id="Nazwisko" name="Nazwisko" required>
            </label>
            <label for="Imie">Imie: 
                <input type="text" id="Imie" name="Imie" required>
            </label>
            <label for="funkcja">Funkcja: 
                <select name="funkcja" id="funkcja">
                    <option value="uczestnik">uczestnik</option>
                    <option value="przewodnik">przewodnik</option>
                    <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                    <option value="organizator">organizator</option>
                    <option value="ratownik">ratownik</option>
                </select>
            </label>
            <label for="email">Email:
                <input type="email" id="email" name="email" required>
            </label>
            <input type="submit" value="Dodaj">

            <?php
                    $connection = mysqli_connect("localhost", "root", "", "zdobywcy");
                    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['Nazwisko']) && isset($_POST['Imie']) && isset($_POST['funkcja']) && isset($_POST['email'])){
                    $nazwisko = $_POST['Nazwisko'];
                    $imie = $_POST['Imie'];
                    $funkcja = $_POST['funkcja'];  
                    $email = $_POST['email'];

                    $query1 = "INSERT INTO osoby (nazwisko, imie, funkcja, email) VALUES ('$nazwisko', '$imie', '$funkcja', '$email');";
                    $result1 = mysqli_query($connection, $query1);
                    if($result1){
                        echo "<p> Dodano uzytkownika do bazy </p>";
                    }else{
                        echo "<p> Błąd podczas dodawania użytkownika: " . mysqli_error($connection) . "</p>";
                    }
                }  
            ?>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Nazwisko</th>
                        <th>Imię</th>
                        <th>Funkcja</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query2 = "SELECT osoby.imie, osoby.nazwisko, osoby.funkcja, osoby.email FROM osoby;";
                        $result2 = mysqli_query($connection, $query2);
                        while($row = mysqli_fetch_assoc($result2)){
                            echo "<tr>";
                            echo "<td>" . $row['nazwisko'] . "</td>";
                            echo "<td>" . $row['imie'] . "</td>";
                            echo "<td>" . $row['funkcja'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "</tr>";
                        }
                        mysqli_close($connection);  
                    ?>
                </tbody>
        </table>
    </section>
    </main>
    <footer>
        <p>Strone wykonal: Mateusz K</p>
    </footer>
</body>
</html>