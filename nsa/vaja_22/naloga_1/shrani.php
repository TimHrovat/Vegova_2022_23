<?php

require_once("index.php");

$data = $_GET;

if (!isset($data["stavbaid"]) || $data["stavbaid"] <= 0) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

if (!isset($data["naslov"]) || !preg_match("/^[A-ZČŠŽ][A-ZČŠŽa-zčšž]{2,30}$/", $data["naslov"])) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

if (!isset($data["kraj"]) || !preg_match("/^[A-ZČŠŽ][A-ZČŠŽa-zčšž]{2,30}$/", $data["kraj"])) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "GeodetskaUprava");

if ($mysqli->connect_errno) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

$query = "INSERT INTO stavba VALUES (?, ?, ?, 0);";

$stmt = $mysqli->prepare($query);

$stmt->bind_param("iss", $data["stavbaid"], $data["kraj"], $data["naslov"]);

$stmt->execute();

if (!$stmt->fetch()) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

echo "zapis dodan";
