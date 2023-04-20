<?php
session_start();

if (!isset($_SESSION["uime"])) {
    header("location: prijava.php");
}
?>

<a href="iskanje_kvad_cena.php">Iskanje - kvadratura ali ceni</a><br>
<a href="iskanje_kraj.php">Iskanje - kraj</a><br>
<a href="odjava.php">Odjava</a><br>
