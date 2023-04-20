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

$conn = mysqli_connect("localhost", "root", "", "geodetskaUprava") or die("error");
$stmt = mysqli_stmt_init($conn);

if (!isset($_GET["kraj"])) return;
else $kraj = $_GET["kraj"];

if (isset($_GET["stran"])) $stran = $_GET["stran"];
else $stran = 1;

if ($stran < 1) $stran = 1;

$q = 'SELECT s2.StavbaID FROM Stavba s1
INNER JOIN Stanovanje s2 ON s1.StavbaID = s2.StavbaID
WHERE s1.Kraj = ?';

mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, "s", $_GET["kraj"]);
mysqli_stmt_execute($stmt);

$rs = mysqli_stmt_get_result($stmt);
$stVseh = mysqli_num_rows($rs);

$stStrani = ceil($stVseh / 5);

if ($stran > $stStrani) $stran = $stStrani;

$offset = ($stran - 1) * 5;

// tabela
$q = 'SELECT s1.kraj, s1.naslov, s1.stavbaID, s2.Zap_st, s2.Povrsina_kvadrati, s2.vrednostStanovanja FROM stavba s1
INNER JOIN Stanovanje s2 ON s1.StavbaID = s2.StavbaID
WHERE s1.Kraj = ?
LIMIT ?, 5';

mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, "si", $_GET["kraj"], $offset);
mysqli_stmt_execute($stmt);

$rs = mysqli_stmt_get_result($stmt);

echo '<table>';
echo '<thead><td>Kraj</td><td>Naslov</td><td>StavbaID</td><td>Zap. št</td><td>Kvadratura</td><td>Cena</td></thead>';
while ($x = mysqli_fetch_assoc($rs)) {
    echo '<tr><td>' . $x["kraj"] . '</td><td>' . $x["naslov"] . '</td><td>' . $x["stavbaID"] .
        '</td><td>' . $x["Zap_st"] . '</td><td>' . $x["Povrsina_kvadrati"] . '</td><td>' . $x["vrednostStanovanja"] . '</td></tr>';
}
echo '</table>';
// konec tabele

echo '<div style="display:flex; gap: 20px;">';
if ($stran != 1) {
    echo '<a href="' . $_SERVER["PHP_SELF"] . '?kraj=' . $kraj . '&' . 'stran=1">prva</a>';
    echo '<a href="' . $_SERVER["PHP_SELF"] . '?kraj=' . $kraj . '&' . 'stran=' . $stran - 1 . '">prejsnja</a>';
}

if ($stran != $stStrani) {
    echo '<a href="' . $_SERVER["PHP_SELF"] . '?kraj=' . $kraj . '&' . 'stran=' . $stran + 1 . '">naslednja</a>';
    echo '<a href="' . $_SERVER["PHP_SELF"] . '?kraj=' . $kraj . '&' . 'stran=' . $stStrani . '">zadnja</a>';
}
echo '</div>';
