<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>

<body>
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = (int)$_GET['id'];

        $db = new mysqli("localhost", "root", "", "users");
        if ($db->connect_errno) {
            echo "Failed to connect to MySQL: " . $db->connect_error;
            exit();
        }

        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>User Details</h1>";
            echo "<p><strong>ID:</strong> {$row["id"]}</p>";
            echo "<p><strong>Name:</strong> {$row["name"]}</p>";
            echo "<p><strong>Email:</strong> {$row["gmail"]}</p>";
        } else {
            echo "<p>User not found.</p>";
        }

        $stmt->close();
        $db->close();
    } else {
        echo "<p>Invalid user ID.</p>";
    }
    ?>
</body>

</html>