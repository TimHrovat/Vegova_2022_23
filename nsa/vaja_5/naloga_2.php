<?php
    echo "
        <style>
            table, tr, td {
                border-collapse: collapse;
                border: 1px solid black;
                text-align: center;
            }
            table {
                width: 100%;
            }

            .first {
                color: blue;
                background-color: lightgreen;
            }
            .mid {
                color: black;
                background-color: lightyellow;
            }
            .last {
                color: blue;
                background-color: lightblue
            }
        </style>
    ";

    $st1 = rand(1,20);
    $st2 = rand(1,20);

    while ($st2 === $st1) 
        $st2 = rand(1,20);

    $t = array($st1 > $st2 ? $st2 : $st1);

    for ($i = 1; $i <= abs($st2 - $st1); $i++) {
        $t[$i] = "*";
    }

    $t[count($t)] = $st1 > $st2 ? $st1 : $st2;

    echo "<table><tr>";
        echo '<td class="first">'.$t[0].'</td>';
        for ($i = 1; $i+1 < count($t); $i++) {
            echo '<td class="mid">'.$t[$i].'</td>';
        }
        echo '<td class="last">'.$t[count($t)-1].'</td>';
    echo "</tr></table>";
?>