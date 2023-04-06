<?php

function produkt($x, $y) {
    $st = 0;
    for ($i = 0; $i < $y; $i++) 
        $st += $x;

    return $st;
}

function potenca($x, $y) {
    $st = 1;
    for ($i = 0; $i < $y; $i++) 
        $st = produkt($st, $x);

    return $st;
}

if (isset($_GET["produkt"]))
    $st = produkt($_GET["stX"], $_GET["stY"]);
else $st = potenca($_GET["stX"], $_GET["stY"]);

echo $st;



