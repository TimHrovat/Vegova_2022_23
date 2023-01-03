<style>
    table, tr, td, th {
        border-collapse: collapse;
        border: 1px solid black;
        text-align:center;
    }
</style>

<?php

require_once("data_amerika.php");
require_once("functions.php");

izpis1($amerika);

echo "<pre>";
$zvezneDrzave = ustvariTabeloDrzav($amerika);
echo "</pre>";

izpis2($zvezneDrzave);

isci($amerika, "D");
isci($amerika, "N");
