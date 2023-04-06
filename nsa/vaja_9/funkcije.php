<style>
    table, td, th {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }

    td, th {
        padding: 4px 8px;
    }

    
    tbody tr:nth-child(even) {
        background-color: orange;
    }
    
    tbody tr:nth-child(odd) {
        background-color: lightgreen;
    }
    thead {
        background-color: white ;
    }

</style>

<?php

    function napolniT($vozila) {
        $t = array();
        for ($i = 0; $i < count($vozila); $i++) {
            $t[$vozila[$i][0]]["zaloga"] = $vozila[$i][1]; 
            $t[$vozila[$i][0]]["prodano"] = $vozila[$i][2]; 
        }
        return $t;
    }

    function nakup($os, $znamka) {
        global $t;
        global $lastnik;
        global $oseba;

        if (!array_key_exists($znamka, $t))
            return 0;

        if ($t[$znamka]["zaloga"] > 0 && in_array($os, $oseba)) {
            $t[$znamka]["prodano"]++;
            $t[$znamka]["zaloga"]--;

            $lastnik[$os][] = $znamka;
            return 1;
        }

        return 0;
    }

    function prodaja($os, $znamka) {
        global $t;
        global $lastnik;

        if (!array_key_exists($os,$lastnik))
            return 0;

        if (!in_array($znamka, $lastnik[$os]))
            return 0;
        
        $t[$znamka]["zaloga"]++;

        for ($i = 0; $i < count($lastnik[$os]); $i++) {
            if ($lastnik[$os][$i] == $znamka) {
                if (count($lastnik[$os]) > 1) {
                    unset($lastnik[$os][$i]);
                    array_values($lastnik[$os]);
                }
                else 
                    unset($lastnik[$os]);
                break;
            }
        }

        return 1;
    }

    function izpisLastnikov($znamka) {
        global $lastnik;
        $znamka_lastniki = array();

        foreach ($lastnik as $oseba => $vozila) {
            if (in_array($znamka, $vozila)) 
                $znamka_lastniki[] = $oseba;
        }

        return $znamka_lastniki;
    }

    function prodajaVseh($ime) {
        global $t;
        global $lastnik;

        if (!array_key_exists($ime, $lastnik))
            return 0;

        foreach ($lastnik[$ime] as $znamka) {
            $t[$znamka]["zaloga"]++;
        }

        unset($lastnik[$ime]);
        return 1;
    }

    function prikazKoličin() {
        global $t;
        global $lastnik;

        $znamke = array();

        echo '<table>';
        echo '<thead><th></th>';

        foreach ($t as $vozilo => $kolicine) {
            $znamke[] = $vozilo;
            echo "<th>".$vozilo."</th>";
        }
        echo '</thead><tbody>';

        foreach ($lastnik as $ime => $vozila) {
            echo '<tr>';
            echo "<td>".$ime."</td>";
            $values = array_count_values($vozila);
            foreach ($znamke as $znamka) {
                $st_vozil = 0;
                if (array_key_exists($znamka, $values))
                    $st_vozil = $values[$znamka];
                echo "<td>".$st_vozil."</td>";
            }
            echo '</tr>';
        }

        echo '</tbody></table>';
    }
?>