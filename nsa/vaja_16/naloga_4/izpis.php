<?php

require_once("index.php");
require_once("banke.php");

function izpisDokapitalizacije()
{
    global $t;

    $sum = 0;
    echo "<table>";
    echo "<tr><th colspan='2'>Dokapitalizacija</th></tr>";
    foreach ($t as $banka => $leta) {
        echo "<tr><td>$banka</td>";
        foreach ($leta as $podatkiLeta) {
            $sum += $podatkiLeta["dokapitalizacija"];
        }
        echo "<td>$sum</td>";
        echo "</td>";
    }
    echo "</table>";
}

function izpisZaposleni()
{
    global $t;


    $sum = 0;
    echo "<table>";
    echo "<tr><th colspan='2'>Zaposleni</th></tr>";
    foreach ($t as $banka => $leta) {
        echo "<tr><td>$banka</td>";
        foreach ($leta as $podatkiLeta) {
            $sum += $podatkiLeta["zaposleni"];
        }
        echo "<td>".$sum / count($leta)."</td>";
        echo "</td>";
    }
    echo "</table>";
}

function izpisSaldo()
{
    global $t;


    $sum = 0;
    echo "<table>";
    echo "<tr><th colspan='2'>Saldo</th></tr>";
    foreach ($t as $banka => $leta) {
        echo "<tr><td>$banka</td>";
        foreach ($leta as $podatkiLeta) {
            $sum += $podatkiLeta["saldo"];
        }
        echo "<td>".$sum / count($leta)."</td>";
        echo "</td>";
    }
    echo "</table>";
}

if (isset($_GET["dokapitalizacija"])) izpisDokapitalizacije();
if (isset($_GET["zaposleni"])) izpisZaposleni();
if (isset($_GET["saldo"])) izpisSaldo();
