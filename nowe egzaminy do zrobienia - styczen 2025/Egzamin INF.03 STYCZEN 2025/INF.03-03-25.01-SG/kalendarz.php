<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $connection = new mysqli("localhost", "root", "", "kalendarz");
    ?>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <div id="napis">
        <?php
        $dzienTygodniaAngielski = date('l');
        $dniTygodnia = [
            'Monday' => 'Poniedziałek',
            'Tuesday' => 'Wtorek',
            'Wednesday' => 'Środa',
            'Thursday' => 'Czwartek',
            'Friday' => 'Piątek',
            'Saturday' => 'Sobota',
            'Sunday' => 'Niedziela'
        ];
        $dzienTygodniaPolski = $dniTygodnia[$dzienTygodniaAngielski];

        $dzisiejszaData = date('d-m-Y');
        $dzisiejszyMiesiacDzien = date('m-d');
        $zapytanieDzis = "SELECT imiona FROM imieniny WHERE data LIKE '$dzisiejszyMiesiacDzien'";
        $wynikDzis = $connection->query($zapytanieDzis);
        $imieninyDzis = $wynikDzis->num_rows > 0 ? implode(', ', array_column($wynikDzis->fetch_all(MYSQLI_ASSOC), 'imiona')) : 'brak';

        echo "<p class='skrypt1'>Dzisiaj jest $dzienTygodniaPolski, $dzisiejszaData, imieniny: $imieninyDzis</p>";
        ?>
    </div>
    <div id="bloki">
        <section id="lewy">
        <section id="lewy">
            <table>
                <caption></caption>
                <tr>
                    <th colspan="2">Dni świąteczne</th>
                </tr>
                <tr>
                    <th>Liczba dni</th>
                    <th>Miesiąc</th>
                </tr>
                <tr>
                    <td rowspan="7">31</td>
                    <td>styczeń</td>
                </tr>
                <tr>
                    <td>marzec</td>
                </tr>
                <tr>
                    <td>maj</td>
                </tr>
                <tr>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>sierpień</td>
                </tr>
                <tr>
                    <td>październik</td>
                </tr>
                <tr>
                    <td>grudzień</td>
                </tr>
                <tr>
                    <td rowspan="4">30</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>czerwiec</td>
                </tr>
                <tr>
                    <td>wrzesień</td>
                </tr>
                <tr>
                    <td>listopad</td>
                </tr>
                <tr>
                    <td>28 lub 29</td>
                    <td>luty</td>
                </tr>
            </table>
        </section>
        </section>
        <section id="srodkowy">
            <h2>Sprawdź kto ma urodziny</h2>
            <form method="post" action="kalendarz.php">
                <label for="data_urodzin">Podaj datę:</label>
                <input type="date" id="data_urodzin" name="data_urodzin" min="2024-01-01" max="2024-12-31" required>
                <input type="submit" value="Wyślij">
            </form>
            <div class="skrypt2">
                <?php
                if (isset($_POST['data_urodzin'])) {
                    $dataFormularz = $_POST['data_urodzin'];
                    $miesiacDzienFormularz = date('m-d', strtotime($dataFormularz));
                    $dataWyswietl = date('d-m-Y', strtotime($dataFormularz));
                    $zapytanieWybranaData = "SELECT imiona FROM imieniny WHERE data LIKE '$miesiacDzienFormularz'";
                    $wynikWybranaData = $connection->query($zapytanieWybranaData);
                    $imieninyWybranaData = $wynikWybranaData->num_rows > 0 ? implode(', ', array_column($wynikWybranaData->fetch_all(MYSQLI_ASSOC), 'imiona')) : 'brak';
                    echo "Dnia $dataWyswietl są imieniny: $imieninyWybranaData";
                }
                ?>
            </div>
        </section>
        <section id="prawy">
            <a href="https://pl.wikipedia.org/wiki/Kalendarz_Maj%C3%B3w" target="_blank">
                <img src="kalendarz.gif" alt="Kalendarz Majów">
            </a>
            <h2>Rodzaje kalendarzy</h2>
            <ol>
                <li>słoneczny
                    <ul>
                        <li>kalendarz Majów</li>
                        <li>juliański</li>
                        <li>gregoriański</li>
                    </ul>
                </li>
                <li>księżycowy
                    <ul>
                        <li>starogrecki</li>
                        <li>babiloński</li>
                    </ul>
                </li>
            </ol>
        </section>
    </div>
    <footer>
        <p>Stronę opracował(a): [Twój Numer Zdającego]</p>
    </footer>
    <?php
    $connection->close();
    ?>
</body>
</html>