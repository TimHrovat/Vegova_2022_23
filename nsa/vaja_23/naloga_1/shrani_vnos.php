<?php

require_once("vnos.php");

$data = $_GET;

if (!isset($data["stavba"])) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

if (!isset($data["st_stanovanja"]) || $data["st_stanovanja"] <= 1) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

if (!isset($data["povrsina"]) || $data["povrsina"] <= 1) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

if (!isset($data["osebe"]) || $data["osebe"] <= 0) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

if (!isset($data["vrednost"]) || $data["vrednost"] <= 1000) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

$mysqli = new $mysqli("localhost", "root", "", "GeodetskaUprava");

if ($mysqli->connect_errno) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

$query = "INSERT INTO stanovanje VALUES (?, ?, ?, ?, ?, ?);";

$stmt = $mysqli->prepare($query);

$stmt->bind_param(
    "iiiiis",
    $data["stavba"],
    $data["st_stanovanja"],
    $data["povrsina"],
    $data["osebe"],
    $data["vrednost"],
    $data["zaupno"] ? password_hash($data["zaupno"], PASSWORD_DEFAULT) : null
);

$stmt->execute();

if ($stmt->fetch()) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

$update_query = "UPDATE stavba SET steviloprebivalcev = steviloprebivalcev + ? WHERE stavbaid = ?";

$update_stmt = $mysqli->prepare($update_query);

$update_stmt->bind_param("ii", $data["osebe"], $data["stavba"]);

$udpate_stmt->execute();

if (!$update_stmt->fetch()) {
    echo "napaka pri dodajanju, zapis NI dodan";
    exit();
}

echo "zapis dodan";
