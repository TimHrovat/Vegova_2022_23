<?php

    function binaryFill(&$tab) {
        for ($i = 0; $i < 8; $i++) {
            $tab[$i] = rand(0,1);
        }
    }

    function prvaPretvorba($tab) {
        $dec = 0;
        for ($i = count($tab) -1; $i >= 0; $i--) {
            $dec += $tab[$i] * pow(2, count($tab)-1 - $i);
        }
        return $dec;
    }

    function drugaPretvorba($tab) {
        $dec = 0;
        for ($i = count($tab) -1; $i > 0; $i--) {
            $dec += $tab[$i] * pow(2, count($tab)-1 - $i);
        }

        if ($tab[0])
            $dec -= 128;

        return $dec;
    }

    function izpis($bin, $dec) {
        echo "<table>";
        echo "<tr><th>Dvojiško število</th><th>Desetiško Število</th></tr>";
        echo "<tr>";
            echo "<td>",implode($bin),"</td>";
            echo "<td>",$dec,"</td>";
        echo"</tr>";
        echo "</table>";
    }
?>