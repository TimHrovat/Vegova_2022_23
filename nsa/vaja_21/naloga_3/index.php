<?php
$conn = mysqli_connect("localhost", "root", "", "geometrija");
if (!$conn) {
    die("Povezava na bazo ni uspela: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["x"];
    $y = $_POST["y"];
    $barva = $_POST["barva"];

    $kvadrant = 0;
    if ($x > 0 && $y > 0) {
        $kvadrant = 1;
    } elseif ($x < 0 && $y > 0) {
        $kvadrant = 2;
    } elseif ($x < 0 && $y < 0) {
        $kvadrant = 3;
    } elseif ($x > 0 && $y < 0) {
        $kvadrant = 4;
    }

    $sql = "INSERT INTO Tocke2D (x, y, barvaHex, kvadrant) VALUES ($x, $y, '$barva', $kvadrant)";
    if (mysqli_query($conn, $sql)) {
        echo "Nova točka uspešno dodana v bazo.";
    } else {
        echo "Napaka pri dodajanju nove točke: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
