<?php
    require_once("utils.php");

    check_access();

    $mysqli = connect();

    $query = "SELECT datumZadnjegaDostopa FROM Uporabnik where imeUporabnika = " . $mysqli->real_escape_string($_SESSION["username"]);

    $user = $mysqli->query($query);

    if ($mysqli->error) {
        exit("prišlo je do napake");
    }

    $user->fetch_assoc();
?>

<h1>Uporabniško ime: <?= $_SESSION["username"] ?></h1><br/>
<span>Datum zadnjega dostopa: <?= $user["datumZadnjegaDostopa"] ?></span><br/>
<hr/>
<a href="izpis.php">izpis podatkov</a><br/>
<a href="dodaj.php">dodaj dijaka</a><br/>
<a href="logout.php">izpiši me</a>