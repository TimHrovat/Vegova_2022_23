<?php

    function funct_1(&$t1) {
        for ($i = 0; $i < 20; $i++) 
            $t1[$i] = rand(1,10);
    }
    function funct_2(&$t2,$t1) {
        $vsota = 0;
        for ($i = 0; $i < count($t1); $i++)
            $vsota += $t1[$i];

        for ($i = 0; $i < count($t1); $i++) 
            $t2[$i] = $vsota - $t1[$i];
    }
    function funct_3(array $t1, array $t2, string $class, string $msg) {
        echo '<table class="',$class,'">';
        echo '<thead><tr><th colspan="20">',$msg,'</th></tr></thead>';
        echo "<tr>";
        for ($i = 0; $i < count($t1); $i++)
            echo "<td>",$t1[$i],"</td>";
        echo "</tr>";

        for ($i = 0; $i < count($t2); $i++)
            echo "<td>",$t2[$i],"</td>";
        echo "</tr>";

        echo "</table>";
    }
?>