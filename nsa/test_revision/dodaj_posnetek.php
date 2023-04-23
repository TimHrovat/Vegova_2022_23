<?php

if (session_status() !== PHP_SESSION_NONE) {
    header("location: login.php");
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "neVemImenaBaze");

$avtorji_q = "SELECT Ime, Priimek, AvtorID FROM Avtor ORDER BY ASC";

$avtorji = $mysqli->query($avtorji_q);

?>

<form action="dodaj_posnetek_script.php" method="post">
    <select name="avtor">
        <?php while ($avtor = $avtorji->fetch_assoc()) { ?>
            <option value=<?= $avtor["avtorID"]?>><?= $avtor["ime"] . " " . $avtor["priimek"] ?></option>
        <?php } ?>
    </select>
    <input type="text" name="naslov" placeholder="naslov" required  />
    <input type="date" name="datum" required />
    <input type="submit" value="dodaj" />
</form>
