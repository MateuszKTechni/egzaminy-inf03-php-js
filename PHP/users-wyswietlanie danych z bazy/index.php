<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $db = new mysqli("localhost", "root", "", "users");
    if ($db->connect_errno) {
        echo "Failed to connect to MySQL: " . $db->connect_error;
        exit();
    }

    $query = ("SELECT * FROM users");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["max"]) && is_numeric($_GET["max"])) {
        $query .= " LIMIT {$_GET["max"]}";
    }

    $result = $db->query($query);

    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row["id"]} {$row["gmail"]} {$row["name"]}</li>";
    }
    ?>
</body>

</html>