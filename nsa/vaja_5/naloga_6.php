<?php

    $t = array();
    $count = 0;

    while (count($t) < 10) {
        $st = rand(1,1000);

        if ($st % 23 === 0) {
            $t[count($t)] = $st;
            echo 'V '.$count.'. poskusu je dobljeno število '.$st.'<br>';
        }

        $count++;
    }

    for ($i = 0; $i < 10; $i++) {
        echo $t[$i].' ';
    }

?>