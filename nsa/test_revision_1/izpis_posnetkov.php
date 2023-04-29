<?php
if (session_status() === PHP_SESSION_NONE) {
    header("location: login.php");
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "neVemImenaBaze");

$query = "SELECT AvtorID, Ime, Priimek FROM Avtor ORDER BY Priimek ASC";

$res = $mysqli->query($query);

?>

<form action="izpis_posnetkov_script.php" method="get">
    <select name="avtor" required>
        <?php while ($row = $res->fetch_assoc()) { ?>
            <option value="<?= $row["AvtorID"] ?>"><?= $row["Priimek"] . " " . $row["ime"] ?> (<?= $row["AvtorID"] ?>)</option>
        <?php } ?>
    </select>
    <input type="submit" value="izpiši" />
</form>