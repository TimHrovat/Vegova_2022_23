<style>
    table, td, tr {
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>

<?php

function napolni(&$tab) {
    for ($i = 0; $i < 70; $i++) {
        $tab[$i] = chr(rand(ord("A"), ord("Z")));
    }
}

function razvrstiNarascajoce(&$tab) {
    sort($tab);
}

function izpis($tab) {
    $prva = $tab[0];
    $zadnja = $tab[count($tab)-1];
    $count = ["prva" => [$prva,0], "zadnja" => [$zadnja,0]];
    echo "<table><tr>";
    foreach($tab as $el) {
        if ($el == $prva) {
            echo '<td style="background-color:lightgrey">',$el,'</td>';
            $count["prva"][1]++;
        } else if ($el == $zadnja) {
            echo '<td style="background-color:lightblue">',$el,'</td>';
            $count["zadnja"][1]++;
        } else {
            echo '<td>',$el,'</td>';
        }
    }
    echo "</tr></table>";
    return $count;
}

function ponovitveABC($tab) {
    $alphabet = [];
    for ($i = 0; $i <= ord("Z") - ord("A"); $i++) 
        $alphabet[] = chr(ord("A")+$i);

    $ponovitve = array_count_values($tab);

    $ponovitveAlphabet = array();
    foreach($alphabet as $letter) {
        if (array_key_exists($letter, $ponovitve))
            $ponovitveAlphabet[$letter] = $ponovitve[$letter];
        else 
            $ponovitveAlphabet[$letter] = 0;
    }

    return $ponovitveAlphabet;
}

function izpisPonovitve($arr) {
    echo "<table>";
    echo "<tr><td>Crka</td><td>Ponovitve</td></tr>";
    foreach ($arr as $crka => $ponovitve) {
        echo "<tr><td>$crka</td><td>$ponovitve</td></tr>";
    }

    echo "</table>";
}