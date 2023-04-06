<style>
    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<?php

$delitelji = [];
$ostala = [];

if ($_GET["min"] >=$_GET["max"]) return;

for ($i = 0; $i < $_GET["num"]; $i++) {
    $g = rand($_GET['min'], $_GET['max']);
    if ($g % $_GET['vec'] == 0) {
        $delitelji[] = $g;
    } else {
        $ostala[] = $g;
    }
}

echo "delitelji: <br />";
echo '<table><tr>';
foreach ($delitelji as $val) {
    echo "<td>$val</td>";
}
echo '</tr></table>';
echo "Vsota: " . count($delitelji);

echo "<br/>Ostalo: <br />";
echo '<table><tr>';
foreach ($ostala as $val) {
    echo "<td>$val</td>";
}
echo '</tr></table>';
echo "Vsota: " . count($ostala);

?>