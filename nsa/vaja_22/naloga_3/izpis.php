<?php

require_once("index.php");

if (!isset($data["kraj"])) {
    exit("napaka pri izpisu");
}

if (!isset($data["osebe"]) || $data["osebe"] <= 0) {
    exit("napaka pri izpisu");
}

$mysqli = new mysqli("localhost", "root", "", "localhost");

if ($mysqli->connect_error) {
    exit("napaka pri izpisu");
}

$query = "SELECT naslov, steviloprebivalcev FROM stavba WHERE kraj = ? AND steviloprebivalcev > ?ORDER BY kraj DESC";

$stmt = $mysqli->prepare($query);

$stmt->bind_param("si", $data["kraj"], $data["osebe"]);

$stmt->execute();

echo "<table><tr><th>Naslov</th><th>Št. Prebivalcev</th></tr>";

$res = $stmt->get_result();

while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    echo '<td>' . $row["naslov"] . '</td>';
    echo '<td>' . $row["steviloprebivalcev"] . '</td>';
    echo "</tr>";
}

$stmt->close();

echo "</table>";
