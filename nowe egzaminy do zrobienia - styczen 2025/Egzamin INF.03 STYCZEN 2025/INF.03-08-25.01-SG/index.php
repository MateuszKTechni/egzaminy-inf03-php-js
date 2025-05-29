<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Mieszalnia farb</title>
    <link rel="shortcut icon" href="fav.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="tlo.png" alt="Mieszalnia farb">
    </header>

    <section id="formularz">
        <form method="post" action="index.php">
            <label for="data_od">Data odbioru od:
                <input type="date" name="data_od" id="data_od">
            </label>
            <label for="data_do">do:
                <input type="date" name="data_do" id="data_do">
            </label>
            <input type="submit" value="Wyszukaj">
        </form>
    </section>

    <main id="glowny">
        <table>
            <thead>
                <tr>
                    <th>Nr zamówienia</th>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Kolor</th>
                    <th>Pojemność [ml]</th>
                    <th>Data odbioru</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $connection = mysqli_connect("localhost", "root", "", "mieszalnia");
                if (isset($_POST['data_od']) && isset($_POST['data_do']) && $_POST['data_od'] && $_POST['data_do']) {
                        $data_od = $_POST['data_od'];
                        $data_do = $_POST['data_do'];
                        $query = "SELECT zamowienia.id, klienci.Nazwisko, klienci.Imie, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru
                                      FROM zamowienia
                                      JOIN klienci ON zamowienia.id_klienta = klienci.id
                                      WHERE zamowienia.data_odbioru BETWEEN '$data_od' AND '$data_do'
                                      ORDER BY zamowienia.data_odbioru ASC";
                    } else {
                        $query = "SELECT zamowienia.id, klienci.Nazwisko, klienci.Imie, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru
                                      FROM zamowienia
                                      JOIN klienci ON zamowienia.id_klienta = klienci.id
                                      ORDER BY zamowienia.data_odbioru ASC";
                    }

                    $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $kolor = ($row['kod_koloru']);
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['Nazwisko']}</td>";
                        echo "<td>{$row['Imie']}</td>";
                        echo "<td style='background-color: #$kolor;'>$kolor</td>";
                        echo "<td>{$row['pojemnosc']}</td>";
                        echo "<td>{$row['data_odbioru']}</td>";
                        echo "</tr>";
                    }

                    mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: Mateusz K</p>
    </footer>
</body>
</html>
