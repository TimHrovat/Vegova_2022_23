<?php
$conn = mysqli_connect("localhost", "root", "", "galerija") or die("napaka pri povezovanju");
$stmt = mysqli_stmt_init($conn);

if (!isset($_POST["uime"])) return;

$uime = $_POST["uime"];

$q = 'INSERT INTO Uporabnik VALUES (?, ?, false)';

$pass = password_hash($_POST["geslo"], PASSWORD_BCRYPT);

try {
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, "ss", $uime, $pass);
    mysqli_stmt_execute($stmt);
} catch (mysqli_sql_exception $e) {
    echo 'Uporabniško ime že obstaja<br/>';
}

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo 'Zapis je dodan';
    mkdir($uime);
    mkdir("$uime/Slike");
    mkdir("$uime/Ostalo");
    header("location: prijava.php");
} else {
    echo 'Prišlo je do napake, zapis NI dodan';
}
