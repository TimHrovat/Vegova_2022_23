<style>
    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<?php

function vsiDelitelji ($num) {
    $delitelji = [];

    for ($i = 1; $i < $num/2 + 1; $i++) {

        if ($num % $i === 0)
            $delitelji[] = $i;
    }

    $delitelji[] = $num;

    return $delitelji;
}

function lihiDelitelji($num) {
    $delitelji = vsiDelitelji($num);

    $lihiDelitelji = [];

    foreach ($delitelji as $del) {
        if ($del % 2 !== 0)
            $lihiDelitelji[] = $num;
    } 

    return $lihiDelitelji;
}

function sodiDelitelji($num) {
    $delitelji = vsiDelitelji($num);

    $sodiDelitelji = [];

    foreach ($delitelji as $del) {
        if ($del % 2 === 0)
            $sodiDelitelji[] = $num;
    } 

    return $sodiDelitelji;
}

if (isset($_GET["vsi_delitelji"])) {
    $delitelji = vsiDelitelji($_GET["x"]);
} else if (isset($_GET["lihi_delitelji"])) {
    $delitelji = lihiDelitelji($_GET["x"]);
} else {
    $delitelji = sodiDelitelji($_GET["x"]);
}

echo "<p>Sodi delitelj števila ".$_GET["x"]."</p><br/>";
echo "<table><tr>";

foreach ($delitelji as $del) {
    echo "<td>".$del."</td>";
}

echo "</tr></table>";

