<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona lotniska</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section id = "header1">
            <img src="zad5.png" alt="logo lotnisko">
        </section>
        <section id = "header2">
            <h1>Przyloty</h1>
        </section>
        <section id = "header3">
            <h3>przydatne linki</h3>
            <a href="kw.txt" target="_blank">Pobierz...</a>
        </section>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>czas</th>
                    <th>kierunek</th>
                    <th>numer rejsu</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $connection = mysqli_connect("localhost", "root", "", "egzamin");
                    $query1 = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
                    $result1 = mysqli_query($connection, $query1);
                    while($row = mysqli_fetch_array($result1)){
                        echo "<tr>";
                        echo "<td>". $row['czas'] . "</td>";
                        echo "<td>". $row['kierunek'] . "</td>";
                        echo "<td>". $row['nr_rejsu'] . "</td>";
                        echo "<td>". $row['status_lotu'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <section id = "footer1">
            <?php
                $cookie_name = "powitanie"; //nazwa ciasteczka
                $duration = time() + (2 * 3600);//czas cookiesa
                if(!isset($_COOKIE[$cookie_name])){//sprawdzamy czy ciasteczko istnieje po tym czy jest nazwane
                    setcookie($cookie_name, 1, $duration);//tworzymy ciasteczko, przekazuje nazwe, bool =1 - istnieje, i czas trwania
                    $comm = "<p><strong>Dzien Dobry! strona uzywa ciasteczek</strong></p>";//komentarz1 jesli ciasteczko krotsze niz 2h
                }else{
                    $comm = "<p><em>Witamy ponowanie na stronie lotniska</em></p>";//komentarz2 jesli ciasteczko dluzsze niz 2h
                }
                echo $comm;//wywolanie komentarza
            ?>
        </section>
        <section id = "footer2">
            <p>Autor: Mateusz K</p>
        </section>
    </footer>
</body>
</html>