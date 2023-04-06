<?php

require_once("fifa.php");

global $t;

echo "<table>";
foreach ($t as $key => $val) {
    rsort($val);
    echo "<tr><th>$key</th>";
    $color = "red";
    foreach ($val as $drzava => $tocke) {
        echo '<td style="color: ' . $color . ';">' . $drzava . " " . $tocke . '</td>';

        $color = "black";
    }

    echo "</tr>";
}

echo "</table>";
