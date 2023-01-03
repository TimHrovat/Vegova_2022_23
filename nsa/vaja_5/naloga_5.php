<?php

    echo "
        <style>
            table {
                border-collapse: collapse;
            }
            td {
                border: 1px solid black;
                color: blue;
            }
            .smaller {
                color: red;
            }    
        </style>
    ";

    $t = array();
    $sum = 0;

    for ($i = 0; $i < 10; $i++) { 
        $t[$i] = rand(100,400);
        $sum += $t[$i];
    }

    $avg = $sum / 10;

    echo "<table><tr>";
    for ($i = 0; $i < 10; $i++) { 
        $class = $t[$i] < $avg ? "smaller" : "";
        echo '<td class="'.$class.'">'.$t[$i].'</td>';
    }
    echo "</tr></table>";

    for ($i = 0; $i < 10 ; $i++) 
        if ($t[$i] < $avg)
            unset($t[$i]);

    $t = array_values($t);

    echo "<table><tr>";
    for ($i = 0; $i < count($t); $i++) { 
        echo '<td>'.$t[$i].'</td>';
    }
    echo "</tr></table>";
?>