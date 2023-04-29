<?php
require_once("izpis_posnetkov.php");

$avtor_info_q = sprintf("SELECT * FROM Avtor WHERE AvtorID = '%s'", $mysqli->real_escape_string($_GET["AvtorID"]));
$avtor_info = $mysqli->query($avtor_info_q)->fetch_assoc();

$posnetki_q = sprintf("SELECT * FROM Posnetki WHERE AvtorID = '%s'", $mysqli->real_escape_string($_GET["AvtorID"]));
$posnetki = $mysqli->query($posnetki_q);

$posnetki_count_q = sprintf("SELECT COUNT(*) FROM Posnetki WHERE AvtorID = '%s'", $mysqli->real_escape_string($_GET["AvtorID"]));
$posnetki_count = $mysqli->query($posnetki_count_q)->fetch_array()[0];

if (!$avtor_info || !$posnetki || !$posnetki_count) {
    exit("queries failed");
}

?>

<?php if ($avtor_info["datotekaFotografija"]) { ?>
    <img src="<?= $avtor_info["datotekaFotografija"] ?>" />
<?php } ?>

<h1><?= $avtor_info["Ime"] . " " . $avtor_info["Priimek"] ?></h1>
<p><?= $avtor_info["Drzava"] ?></p>
<p><?= $avtor_info["Spol"] ?></p>

<style>
    tr, th, td, table {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table>
    <thead>
        <tr>
            <th>PID</th>
            <th>Naslov</th>
            <th>Datum</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $posnetki->fetch_assoc()) { ?>
            <tr>
                <td><?= $row["PID"] ?></td>
                <td><?= $row["Naslov"] ?></td>
                <td><?= $row["Datum"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<p>Skupaj posnetkov: <?= $posnetki_count ?></p>

<?php
    $mysqli->close();
?>