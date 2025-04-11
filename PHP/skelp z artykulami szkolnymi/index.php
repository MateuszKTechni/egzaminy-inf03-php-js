<?php
$db = mysqli_connect('localhost', 'root', '', 'arkusz1');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="main.css" />
</head>
<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <div id="content-wrapper">
        <section id="left">
            <h2>Nasze ceny</h2>
            <table>
                <?php
                $sql = "SELECT nazwa, cena FROM towary LIMIT 4";
                $result = $db->query($sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                            <td>{$row['nazwa']}</td>
                            <td>{$row['cena']}</td>
                          </tr>";
                }
                ?>
            </table>
            <table>
                <tr>
                    <td>Zeszyt 60 kartek</td>
                    <td>4.5</td>
                </tr>
                <tr>
                    <td>Zeszyt 32 kartki</td>
                    <td>1.2</td>
                </tr>
                <tr>
                    <td>Cyrkiel</td>
                    <td>12.4</td>
                </tr>
                <tr>
                    <td>Linijka 30 cm</td>
                    <td>7.2</td>
                </tr>
            </table>
        </section>
        <section id="right">
            <h2>Kontakt</h2>
            <img src="zakupy.png" alt="hurtownia" />
            <p><a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
        </section>
    </div>
    <div id="center-wrapper">
        <section id="center">
            <h2>Koszt zakupów</h2>
            <form>
                <label>Wybierz artykuł:</label>
                <select name="item">
                    <option value="4.5">Zeszyt 60 kartek</option>
                    <option value="1.2">Zeszyt 32 kartki</option>
                    <option value="12.4">Cyrkiel</option>
                    <option value="7.2">Linijka 30 cm</option>
                </select>
                <label>Liczba sztuk:</label>
                <input type="number" name="quantity" min="1" value="1" />
                <button type="button">OBLICZ</button>
            </form>
            <div id="totalCost">Wartość zakupów:</div>
        </section>
    </div>
    <?php
    $db->close();
    ?>
    <footer>
        <h4>Witrynę wykonał: 00000000000</h4>
    </footer>
</body>
</html>
