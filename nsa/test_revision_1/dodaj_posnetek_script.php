<?php

require_once("dodaj_posnetek.php");

$insert_query = "INSERT INTO Posnetek (AvtorID, Naslov, Datum) VALUES (?, ?, ?);";

$stmt = $mysqli->prepare($insert_query);

$avtorId = $_POST["AvtorID"] or exit("no avtorid");
$naslov = $_POST["Naslov"] or exit("no naslov");
$datum = $_POST["Datum"] or exit("no datum");

$stmt->bind_param("iss", $avtorId, $naslov, $datum);

$stmt->execute();

if ($stmt->errno) {
    echo "pri dodajanju posnetka je prišlo do napake";
    exit();
}

echo "posnetek je dodan";

$mysqli->close();