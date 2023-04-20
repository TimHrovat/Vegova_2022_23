<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "galerija") or die("error");
$stmt = mysqli_stmt_init($conn);

$q = 'SELECT uName, geslo FROM Uporabnik WHERE uName = ?';

mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, "s", $_POST["uime"]);
mysqli_stmt_execute($stmt);

$rs = mysqli_stmt_get_result($stmt);
$x = mysqli_fetch_assoc($rs);

if (count($x) > 0) {
    if (password_verify($_POST["geslo"], $x["geslo"])) {
        $_SESSION["uime"] = $_POST["uime"];
        header("location: glavni_meni.php");
    } else {
        header("location: prijava.php");
    }
} else {
    header("location: prijava.php");
}
?>
