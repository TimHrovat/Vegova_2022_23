<?php

function addNums($n, $a, $b) {
    global $del3;
    global $ostale;

    for ($i = 0; $i < $n; $i++) {
        $num = rand($a, $b);

        if ($num % 3 == 0) 
            $del3[] = $num;
        else 
            $ostale[] = $num;
    }
}