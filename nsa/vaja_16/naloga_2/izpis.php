<style>
    td,tr,table {
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>

<?php

require_once("banke.php");
require_once("index.php");

$data = $_GET;

echo "<table>";
foreach ($t as $bank => $leta) {
    echo "<tr>";
    echo '<th style="color: blue;">' . $bank . "</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $leta[$data["leto"]]["saldo"] . "</td>";
    echo "<td>" . $leta[$data["leto"]]["zaposleni"] . "</td>";
    echo "<td>" . number_format((float)$leta[$data["leto"]]["dokapitalizacija"], 2, '.', '') . " mil €</td>";
    echo "</tr>";
}
echo "</tr>";
