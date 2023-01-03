<?php

    $t = array();

    $indexes = array(
        'A' => array(),
        'B' => array(),
        'C' => array(),
    ); 

    for ($i = 0; $i < 30; $i++) {
        $t[$i] = chr(rand(ord('A'), ord('Z')));

        echo $t[$i].' ';

        if ($t[$i] === 'A')
            $indexes["A"][count($indexes['A'])] = $i;
        else if ($t[$i] === 'B')
            $indexes["B"][count($indexes['B'])] = $i;
        else if ($t[$i] === 'C')
            $indexes["C"][count($indexes['C'])] = $i;
    }

    echo "<br>";
    echo "Mesta črke A: ";
    for ($i = 0; $i < count($indexes["A"]); $i++)
        echo $indexes["A"][$i].' ';

    echo "<br>";
    echo "Mesta črke B: ";
    for ($i = 0; $i < count($indexes["B"]); $i++)
        echo $indexes["B"][$i].' ';

    echo "<br>";
    echo "Mesta črke C: ";
    for ($i = 0; $i < count($indexes["C"]); $i++)
        echo $indexes["C"][$i].' ';

?>