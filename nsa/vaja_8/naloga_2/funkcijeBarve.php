<?php 

function addPoints(&$tab) {
    for ($i = 0; $i < 5; $i++) {
        $x = rand(-9,9);
        $y = rand(-9,9);
        $key = "silver";

        if ($x >= 0 && $y >= 0) 
            $key = "red";
        else if ($x >= 0 && $y < 0)
            $key = "green";
        else if ($x < 0 && $y >= 0)
            $key = "blue";

        $tab[$key][] = array($x, $y);
    }
}

function output($tab) {
    echo "<table>";
    foreach($tab as $key => $tocke) {
        echo "<tr>";
        foreach($tocke as $tocka) {
            echo '<td style="color:',$key,' ">(',$tocka[0],",",$tocka[0],')</td>';
        }
        echo "</tr>";
    }
    echo "</table>";
}