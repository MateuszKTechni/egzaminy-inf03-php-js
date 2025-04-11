<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="form-container">
    <form id="userform" action="index.php" method="POST">
      <h1>Formularz</h1>
      <div>
        <label for="fname">Imie:</label>
        <input type="text" name="fname" id="fname" required pattern="[A-Za-z]{3,20}"
          title="Imie powinno zawierać od 3 do 20 liter małych lub dużych">
      </div>
      <div>
        <label for="lname">Nazwisko:</label>
        <input type="text" name="lname" id="lname" required pattern="[A-Za-z]{3,20}"
          title="Imie powinno zawierać od 3 do 20 liter małych lub dużych">
      </div>
      <div>
        <label for="birthdate">Data urodzenia</label>
        <input type="date" name="birthdate" id="birthdate" required>
      </div>

      <div>
        <label for="email">Adres email:</label>
        <input type="email" name="email" id="email" required>
      </div>

      <div>
        <label for="password" name="password" id="password">Hasło:</label>
        <input type="password" name="password" id="password">
      </div>

      <div>
        <label for="passwd2">Powtórz hasło:</label>
        <input type="password" name="passwd2" id="passwd2">
      </div>

      <div>
        <label for="agecat">Kategoria wiekowa:</label>
        <select name="agecat" id="agecat">
          <option value="0">0 - 18</option>
          <option value="1">18+</option>
          <option value="2">60+</option>
        </select>
      </div>

      <div>
        <input type="checkbox" name="consent" id="consent">
        <label for="consent">Zgoda na przetwarzanie danych osobowych</label>
      </div>

      <div>
        <input type="checkbox" name="newsletter" id="newsletter">
        <label for="newsletter">Zgoda na wysyłanie newslettera</label>
      </div>

      <div>
        <input type="checkbox" name="offers" id="offers">
        <label for="offers">Zgoda na wysyłanie ofert</label>
      </div>

      <input type="submit" value="Wyślij">
    </form>

    <?php
    $db = new mysqli('localhost', 'root', '', 'powtorzenie');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $errors = [];

      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $birthdate = $_POST["birthdate"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $passwd2 = $_POST["passwd2"];
      $agecat = $_POST["agecat"];
      $consent = isset($_POST["consent"]) ? 1 : 0;
      $newsletter = isset($_POST["newsletter"]) ? 1 : 0;
      $offers = isset($_POST["offers"]) ? 1 : 0;

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      if (empty($errors)) {
        $query = "INSERT INTO `users` (`firstname`, `lastname`, `birthdate`, `agecategory`, `email`, `passwd`, `consent`, `newsletter`, `offers`) 
                        VALUES ('$fname', '$lname', '$birthdate', '$agecat', '$email', '$hashedPassword', '$consent', '$newsletter', '$offers')";

        if ($db->query($query)) {
          echo "<p>Dane zostały zapisane poprawnie.</p>";
          header("Location: " . $_SERVER['PHP_SELF']);
          exit;
        } else {
          echo "<p>Wystąpił błąd podczas zapisywania danych: " . $db->error . "</p>";
        }
      } else {
        foreach ($errors as $error) {
          echo "<p style='color:red;'>$error</p>";
        }
      }
    }

    $db->close();
    ?>
    <div id="errorMessages"></div>
  </div>
  <div class="data-container">
    <h1>Dane</h1>
    <table>
      <tr>
        <th>Id</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Birthday</th>
        <th>Email</th>
        <th>Age category</th>
        <th>Consent</th>
        <th>Newsletter</th>
        <th>Offers</th>
      </tr>
      <?php
      $db = new mysqli('localhost', 'root', '', 'powtorzenie');

      function ageCategory($number)
      {
        switch ((int) $number) {
          case 0:
            return "0-18";
          case 1:
            return "18+";
          case 2:
            return "60+";
          default:
            return "Nieznana kategoria";
        }
      }

      function isConsent($number)
      {
        return $number == 1 ? "Tak" : "Nie";
      }

      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
      }

      if (isset($_GET["amount"]) && is_numeric($_GET["amount"])) {
        $amountData = (int)$_GET["amount"];
        $query = "SELECT * FROM users LIMIT $amountData";
      } else {
        $query = "SELECT * FROM users";
      }

      $result = $db->query($query);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['firstname'] . "</td>
                <td>" . $row['lastname'] . "</td>
                <td>" . $row['birthdate'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . ageCategory($row['agecategory']) . "</td>
                <td>" . isConsent($row['consent']) . "</td>
                <td>" . isConsent($row['newsletter']) . "</td>
                <td>" . isConsent($row['offers']) . "</td>
            </tr>";
        }
      } else {
        echo "<tr><td colspan='9'>No records found.</td></tr>";
      }

      $db->close();
      ?>
    </table>
  </div>
  <script src="main.js"></script>
</body>

</html>