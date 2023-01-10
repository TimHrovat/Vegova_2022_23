<?php

function plus($a, $b) {
    return $a + $b;
}

function krat($a, $b) {
    return $a * $b;
}

$a = (float) $_GET["x"];
$b = (float) $_GET["y"];

if (floor($a) === $a && floor($b) === $b) {
    if (isset($_GET["plus"])) {
        $result = plus($a, $b);

        echo $a." plus ".$b." ==> ".$result;

    } else {
        $result = krat($a, $b);

        echo $a." krat ".$b." ==> ".$result;
    }
} else {
    if (isset($_GET["plus"])) {
        echo "Izbrana operacija plus, napačni vhodni podatki";
    } else {
        echo "Izbrana operacija krat, napačni vhodni podatki";
    }
}
