<?php
    $connect = mysqli_connect("localhost", "root", "", "users");
    $query1 = "SELECT * FROM users";
    $result1 = mysqli_query($connect, $query1);
    while(mysqli_fetch_array($result1)){
        echo"<h1>$row[0]</h1>"
        echo"<h1>$row[1]</h1>"
    }
    mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rejestracji</title>
    <script>
        // Funkcja walidująca formularz
        function validateForm(event) {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirmPassword").value;

            // Sprawdzanie, czy hasła są takie same
            if (password !== confirmPassword) {
                alert("Hasła nie są takie same!");
                event.preventDefault(); // Zapobiega wysłaniu formularza
                return false;
            }
            
            return true; // Hasła są takie same, formularz jest wysyłany
        }
    </script>
</head>
<body>
    <form action="process.php" method="POST" onsubmit="return validateForm(event)">
        <label for="name">Imię:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="surname">Nazwisko:</label>
        <input type="text" id="surname" name="surname" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirmPassword">Potwierdź Hasło:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br>

        <button type="submit">Zarejestruj</button>
    </form>
</body>
</html>

<?php
    // Połączenie z bazą danych
    $connect = mysqli_connect("localhost", "root", "", "users");

    // Sprawdzamy, czy formularz został wysłany metodą POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Pobranie danych z formularza
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // Sprawdzenie, czy hasła są takie same
        if ($password === $confirmPassword) {
            // Przygotowanie zapytania do wstawienia danych do bazy danych
            $query = "INSERT INTO users (imie, naziwsko, email, haslo) VALUES ('$name', '$surname', '$email', '$password')";
            $result = mysqli_query($connect, $query);

            // Sprawdzenie, czy zapytanie zostało wykonane pomyślnie
            if ($result) {
                echo "Rejestracja zakończona sukcesem!";
            } else {
                echo "Wystąpił błąd podczas rejestracji: " . mysqli_error($connect);
            }
        } else {
            echo "Hasła nie są takie same!";
        }
    } else {
        echo "Formularz nie został wysłany!";
    }

    // Zamknięcie połączenia z bazą danych
    mysqli_close($connect);
?>