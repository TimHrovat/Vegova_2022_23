<?php
session_start();
if (!isset($_SESSION["uime"])) header("location: prijava.php");
$uime = $_SESSION["uime"];

if (isset($_GET["pot"])) $pot = $_GET["pot"];
else return;

$x = explode("/", $pot);
$dat = $x[2];
var_dump($dat);

$conn = mysqli_connect("localhost", "root", "", "galerija");
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, "SELECT d.dID FROM datoteka d
INNER JOIN Objava o ON o.dID = d.dID WHERE d.imeDatoteke = ? AND o.uName = ?");
mysqli_stmt_bind_param($stmt, "ss", $dat, $uime);
mysqli_stmt_execute($stmt);

$dID = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))["dID"];

mysqli_stmt_prepare($stmt, "DELETE FROM objava WHERE uName = ? AND dID = ?");
mysqli_stmt_bind_param($stmt, "si", $uime, $dID);
mysqli_stmt_execute($stmt);

mysqli_stmt_prepare($stmt, "DELETE FROM datoteka WHERE dID = ?");
mysqli_stmt_bind_param($stmt, "i", $dID);
mysqli_stmt_execute($stmt);

unlink($pot);

header("location: brisanjeDatotek.php");
?>
