<?php

function napolni(&$tab) {
    foreach ($tab as &$month) {
        for ($i = 0; $i < 6; $i++) {
            $month[] = rand(10,20);
        }
    }
}

function izpisi($tab) {
    echo "<table>";
    foreach($tab as $month => $values) {
        echo "<tr><td>$month</td>";
        foreach($values as $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function spremeni(&$tab) {
    foreach($tab as &$values) {
        $min = array(min($values));
        $values = array_values(array_diff($values,$min));
    }
}

function prepisi($tab) {
    $tab2 = array();

    $sum = 0;
    $count = 0;
    foreach($tab as $val) {
        $count++;;
        $sum += array_sum($val);
    }
    $avg = $sum/$count;

    foreach($tab as $key => $val) {
        $sum_mesec = array_sum($val);
        if ($sum_mesec < $avg) 
            $tab2[$key] = $val;
    }
    return $tab2;
}