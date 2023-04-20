<?php
session_start();

if (!isset($_SESSION["uime"])) {
    header("location: prijava.php");
}

echo '<style>
table, tr, td {
    border-collapse: collapse;
    border: 1px solid black;
	text-align: center;
}

td {
    padding: 0 10px;
}

thead {
    background: #dbdbdb;
    font-weight: bold;
}
</style>';

if (!isset($_GET["kvad"]) || !isset($_GET["raz1"]) || !isset($_GET["cena"]) || !isset($_GET["raz2"])) return;

$conn = mysqli_connect("localhost", "root", "", "geodetskaUprava") or die("error");
$stmt = mysqli_stmt_init($conn);

$q = 'SELECT s1.kraj, s1.naslov, s1.stavbaID, s2.Zap_st, s2.Povrsina_kvadrati, s2.vrednostStanovanja FROM stavba s1
INNER JOIN stanovanje s2 ON s1.StavbaID = s2.StavbaID
WHERE s2.VrednostStanovanja >= ? AND s2.Povrsina_kvadrati >= ?
ORDER BY s2.Povrsina_kvadrati';

if ($_GET["raz1"] == "pad") $q = $q . ' DESC';

$q = $q . ', s2.VrednostStanovanja';
if ($_GET["raz2"] == "pad") $q = $q . ' DESC';

mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, "dd", $_GET["cena"], $_GET["kvad"]);
mysqli_stmt_execute($stmt);

$rs = mysqli_stmt_get_result($stmt);

echo '<table>';
echo '<thead><td>Kraj</td><td>Naslov</td><td>StavbaID</td><td>Zap. št</td><td>Kvadratura</td><td>Cena</td></thead>';
while ($x = mysqli_fetch_assoc($rs)) {
    echo '<tr><td>'.$x["kraj"].'</td><td>'.$x["naslov"].'</td><td>'.$x["stavbaID"].
    '</td><td>'.$x["Zap_st"].'</td><td>'.$x["Povrsina_kvadrati"].'</td><td>'.$x["vrednostStanovanja"].'</td></tr>';
}
echo '</table>';

?>
