<?php

function fill(&$beseda) {
    for ($i = 0; $i < 10; $i++) {
        $beseda .= chr(rand(ord('a'),ord('z')));
    }
}

function fillByType($beseda, &$sog, &$sam) {
    $samoglasniki = ["a", "e", "i", "o", "u"];
    $beseda = str_split($beseda);

    for ($i = 0; $i < count($beseda); $i++) {
        if (in_array($beseda[$i], $samoglasniki))
            $sam .= $beseda[$i];
        else 
            $sog .= $beseda[$i];
    }
}

function izpis($naziv, $beseda) {
    echo "<p>$naziv (",strlen($beseda),"): ",$beseda,"</p>";
}

function findFirst($str) {
    if (!strlen($str))
        return "NA";
    
    $str = str_split($str);

    $min = $str[0];
    for ($i = 1; $i < count($str); $i++) {
        $min = $min > $str[$i] ? $str[$i] : $min;
    }

    return $min;
}