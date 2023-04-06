<?php

function fill(&$arr) {
    for ($i = 0; $i < 10; $i++) {
        do {
            $arr[$i] = rand(100,400);
        } while ($arr[$i] % 2 == 0);
    }
}

function izpis($arr, $msg, $type) {
    $class = "";
    switch ($type) {
        case 0:
            $class = "original";
            break;
            case 1:
                $class = "sorted";
                break;
            }
    echo '<table class="',$class,'">';

    echo "<caption>$msg</caption><tr>";

    for ($i = 0; $i < count($arr); $i++) {
        echo "<td>$arr[$i]</td>";
    }

    echo "</tr>";

    echo "</table>";
}

function sortiraj(&$arr) {
    rsort($arr);
}