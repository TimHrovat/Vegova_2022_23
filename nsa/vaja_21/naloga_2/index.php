<?php

$conn = mysqli_connect("localhost", "root", "", "geometrija");

if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}

$x = $_POST["x"];
$y = $_POST["y"];
$barvaHex = $_POST["barvaHex"];

$kvadrant = 1;
if ($x < 0) {
    $kvadrant += 1;
}
if ($y < 0) {
    $kvadrant += 2;
}

$sql = "INSERT INTO tocke2D (x, y, barvaHex, kvadrant)
VALUES ('$x', '$y', '$barvaHex', '$kvadrant')";

if ($conn->query($sql) === TRUE) {
    echo "Podatki o točki so bili uspešno vstavljeni.";
} else {
    echo "Napaka pri vstavljanju podatkov: " . $conn->error;
}

$conn->close();
