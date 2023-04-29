<?php

require_once("dodaj.php");

$id = $_POST["id"];
$name = $_POST["ime"];
$surname = $_POST["priimek"];
$school = $_POST["school"];
$gender = $_POST["spol"];

$check_id_q = "SELECT * FROM Dijak WHERE id = " . $mysqli->real_escape_string($id);

$res = $mysqli->query($check_id_q);

if ($res->num_rows > 0) {
    exit("prišlo je do napake, id obstaja");
}

$add_q = "INSERT INTO Dijak VALUES (?, ?, ?, ?, ?)";

$add_stmt = $mysqli->prepare($add_q);

$add_stmt->bind_param("issis", $id, $name, $surname, $school, $gender);

$add_stmt->execute();

if ($add_stmt->error) {
    exit("Pri dodajanju zapisa je prišlo do napake");
}

echo ("Zapis je bil dodan");
