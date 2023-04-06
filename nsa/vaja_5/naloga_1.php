<?php
    echo "
        <style>
            td {
                color: blue;
            }

            td.samoglasnik {
                color: red;
            }

            td {
                border: 1px solid black;
            }
            table {
                border-collapse: collapse;
            }
        </style>
    ";


    $t = array();

    echo "<table><tr>";
    for ($i = 0; $i < 10; $i++) {
        $t[$i] = chr(rand(ord('a'), ord('z')));

        $class = ord($t[$i]) === ord('a') || ord($t[$i]) === ord('e') || ord($t[$i]) === ord('i') || ord($t[$i]) === ord('o') || ord($t[$i]) === ord('u')? "samoglasnik" : "";

        echo '<td class="'.$class.'">'.$t[$i].'</td>'; 
    }
    echo "</tr></table>";

?>