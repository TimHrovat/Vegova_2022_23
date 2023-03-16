<?php
require_once("index.php");

$get = $_GET;

$kraj = isset($get["kraj"]) ? "k.imeKraja ASC" : "";
$priimek = isset($get["priimek"]) ? "o.priimek ASC" : "";
$starost = isset($get["starost"]) ? "o.starost ASC" : "";

$order = [];

if ($kraj !== "") {
    $order[] = $kraj;
}

if ($priimek !== "") {
    $order[] = $priimek;
}

if ($starost !== "") {
    $order[] = $starost;
}

$order_str = implode(",", $order);

$conn = mysqli_connect("localhost", "root", "", "bazaOseb");
$q = "SELECT * FROM Oseba o INNER JOIN Kraj k ON k.KID = o.KID" . $order_str !== "" ? $order_str . ";" : ";";

$rs = mysqli_query($conn, $q);

echo '<table><thead><th><td colspan="9">Osebe</td></th></thead><tbody>';

while ($x = mysqli_fetch_assoc($rs)) {
    echo "<tr>";
    echo '<td>' . $x["id"] . '</td>';
    echo '<td>' . $x["ime"] . '</td>';
    echo '<td>' . $x["priimek"] . '</td>';
    echo '<td>' . $x["email"] . '</td>';
    echo '<td>' . $x["opis"] . '</td>';
    echo '<td>' . $x["KID"] . '</td>';
    echo '<td>' . $x["imeKraja"] . '</td>';
    echo "</tr>";
}

echo '</tbody></table>';

mysqli_close($conn);
