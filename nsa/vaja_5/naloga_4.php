<?php

    $t = array();

    $indexes = array(
        'velike' => array(),
        'male' => array(),
        'ostale' => array(),
    ); 

    for ($i = 0; $i < 30; $i++) {
        $t[$i] = rand(0,255);

        echo $t[$i].' ';

        if ($t[$i] >= ord("A") && $t[$i] <= ord("Z"))
            $indexes["velike"][count($indexes['velike'])] = $i;
        else if ($t[$i] >= ord("a") && $t[$i] <= ord("z"))
            $indexes["male"][count($indexes['male'])] = $i;
        else 
            $indexes["ostale"][count($indexes['ostale'])] = $i;
    }

    echo "<br>";
    echo "ASCII kode velikih črk so na mestih: ";
    for ($i = 0; $i < count($indexes["velike"]); $i++)
        echo $indexes["velike"][$i].' ';

    echo "<br>";
    echo "ASCII kode malih črk so na mestih: ";
    for ($i = 0; $i < count($indexes["male"]); $i++)
        echo $indexes["male"][$i].' ';

    echo "<br>";
    echo "ASCII kode ostalih znakov so na mestih: ";
    for ($i = 0; $i < count($indexes["ostale"]); $i++)
        echo $indexes["ostale"][$i].' ';

?>