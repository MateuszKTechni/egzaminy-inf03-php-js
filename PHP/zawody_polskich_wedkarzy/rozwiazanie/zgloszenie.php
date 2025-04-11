<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = new mysqli("localhost", "root", "", "wedkarstwo");


    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    $lowisko = $_POST['lowisko'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];

    $sql = "INSERT INTO Karty_wedkarskie (Karty_wedkarskie_id, Lowsiko_id, data_zawodow, sedzia) VALUES (0 , '$lowisko', '$data', '$sedzia')";


    $result = $conn->query($sql);


    if ($result === true) {
        echo "Zgłoszenie dodano pomyślnie";
    } else {
        echo "Błąd: " . $conn->error;
    }

    $conn->close();
}

?>;
