<?php

// without prepared statements -_-

$mysqli = new mysqli("localhost", "root", "", "neVemImenaBaze");

if ($mysqli->connect_errno) {
    echo "connection failed";
    exit();
}

$query = sprintf("SELECT geslo FROM Uporabnik WHERE uime = '%s'", $mysqli->real_escape_string($_POST["username"]));

$password = $mysqli->query($query)->fetch_assoc()["geslo"];

if (!$password || md5($_POST["password"]) !== $password) {
    echo "wrong username or password";
    exit();
}

session_start();

$_SESSION["username"] = $_POST["username"];

header("Location: izpis_posnetkov.php");

$mysqli->close();
