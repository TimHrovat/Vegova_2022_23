<?php

    function funkcijaA(&$tab) {
        $tab[13] = array("ime" => "Tim", "igraca" => array("kocke", "voscenke"));
    }

    function funkcijaB($tab) {
        foreach($tab as $val) {
            echo "<p><b>",$val["ime"],": </b>";
            foreach ($val["igraca"] as $igraca) {
                echo $igraca," ";
            }
            echo "</p>";
        }
    }
    function funkcijaC($tab, $item) {
        foreach($tab as $val) {
            if (in_array($item, $val["igraca"]))
                echo "<p>",$val["ime"],"</p>";
        }
    }

    function funkcijaD($tab, $item) {
        foreach($tab as $val) {
            if (!in_array($item, $val["igraca"]))
                echo "<p>",$val["ime"],"</p>";
        }
    }
?>
