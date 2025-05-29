<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    
    <nav>
        <a href="kwerenda1.png">KWERENDA1</a>
        <a href="kwerenda2.png">KWERENDA2</a>
        <a href="kwerenda3.png">KWERENDA3</a>
        <a href="kwerenda4.png">KWERENDA4</a>
    </nav>

    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>

    <main>
        <h4>Wybierz rodzaj wypieków:</h4>

        <form action="piekarnia.php" method="POST">
            <select name="bake_type">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "piekarnia");
                    $query_types = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC";
                    $result_types = mysqli_query($conn, $query_types);

                    while ($row = mysqli_fetch_assoc($result_types)) {
                        $type = $row['Rodzaj'];
                        echo "<option value=\"$type\">$type</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Wybierz">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Rodzaj</th>
                    <th>Nazwa</th>
                    <th>Gramatura</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bake_type'])) {
                    $selected_type =  $_POST['bake_type'];
                    $query_products = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$selected_type'";
                    $result_products = mysqli_query($conn, $query_products);

                    if (mysqli_num_rows($result_products) > 0) {
                        while ($row = mysqli_fetch_assoc($result_products)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['Rodzaj']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Nazwa']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Gramatura']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Cena']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Brak wyników</td></tr>";
                    }
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>AUTOR: Mateusz K.</p>
        <p>Data: 29.05.2025</p>
    </footer>
</body>
</html>
