<?php
$conn = mysqli_connect("localhost", "root", "", "geodetskaUprava") or die("error");
$stmt = mysqli_stmt_init($conn);

if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]+)*$/", $_POST["geslo"]) || strlen($_POST["geslo"]) < 8) {
    echo 'Geslo mora vsebovati vsaj eno števko, eno veliko črko, eno malo črko, dolžine vsaj 8 znakov';
    return;
}

if (!preg_match("/^[A-Z][a-zA-Z]+$/", $_POST["ime"])) {
    echo 'Ime lahko vsebuje le črke z veliko začetnico';
    return;
}

if (!preg_match("/^[A-Z][a-zA-Z]+$/", $_POST["priimek"])) {
    echo 'Priimek lahko vsebuje le črke z veliko začetnico';
    return;
}

$q = 'INSERT INTO Uporabnik VALUES (?, ?, ?, ?, ?, ?, ?, 0)';

$g = password_hash($_POST["geslo"], PASSWORD_BCRYPT);
$datum = date("Y-m-d");

try {
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, "sssssss", $_POST["uime"], $g, $datum, $_POST["ime"], $_POST["priimek"],  $_POST["email"], $datum);
    mysqli_stmt_execute($stmt);
} catch (mysqli_sql_exception $e) {
    echo 'Uporabniško ime ali email že obstaja<br/>';
}

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo 'Zapis je dodan';
    header("location: prijava.php");
} else {
    echo 'Prišlo je do napake, zapis NI dodan';
}

?>
