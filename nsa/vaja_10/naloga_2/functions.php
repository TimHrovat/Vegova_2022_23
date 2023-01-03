<?php

function izpis1($arr) {
    ksort($arr);

    echo "<table>";

    echo "<tr><th>Ime kraja</th><th>Kratica države</th><th>Število prebivalcev</th></tr>";

    foreach ($arr as $drzava => $podatki) {
        echo "<tr><td>$drzava</td>";
        foreach ($podatki as $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

function ustvariTabeloDrzav($arr) {
    $zvezneDrzave = array();

    foreach ($arr as $kraj => $podatki){
        if (!array_key_exists($podatki["drzava"], $zvezneDrzave))
            $zvezneDrzave[$podatki["drzava"]] = array();

        $zvezneDrzave[$podatki["drzava"]][$kraj] = $podatki["prebivalci"];
    }

    ksort($zvezneDrzave);

    foreach ($zvezneDrzave as $kraji) {
        arsort($kraji);
    }

    return $zvezneDrzave;
}

function izpis2($arr) {

    echo "<table>";

    foreach ($arr as $kratica => $kraji) {
        echo "<tr><td colspan=2>$kratica</td></tr>";
        foreach ($kraji as $kraj => $prebivalci) {
            echo "<tr>";
            echo "<td>$kraj</td>";
            echo "<td>$prebivalci</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
}

function isci($tab, $zac) {
    echo "<table>";
    echo "<tr><th>Ime kraja</th><th>Kratica države</th><th>Število prebivalcev</th></tr>";
    foreach($tab as $kraj => $podatki) {
        $kr = str_split($kraj);
        if ($kr[0] == $zac) {
            echo "<tr><td>$kraj</td><td>",$podatki["drzava"],"</td><td>",$podatki["prebivalci"],"</td></tr>";
        }
    }
    echo "</table>";
}   