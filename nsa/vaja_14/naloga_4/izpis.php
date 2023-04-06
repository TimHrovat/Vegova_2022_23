<style>
    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    thead tr td {
        text-align: center;
    }

    table {
        margin-bottom: 20px;
    }
</style>

<?php

require_once("prostornina.php");

$brands = $_GET;

print_r($brands);

foreach ($brands as $brand) {
    echo "<table>";
    echo '<thead><tr><th colspan="2">'.$brand.'</th></tr></thead>';
    echo "<tbody>"; 

    foreach ($prostornina[$brand] as $model => $ccm) {
        echo "<tr><td>$model</td><td>$ccm</td></tr>";
}}

echo "</tbody>";
echo "</table>";
