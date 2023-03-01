<?php

$beseda = $_GET["beseda"];

$letter_array = str_split($beseda, 1);

echo "beseda je:" . implode($letter_array) . '<br />';
sort($letter_array);
echo "prva beseda po abecedi je: " . implode($letter_array) . '<br />';
rsort($letter_array);
echo "zadnja beseda po abecedi je: " . implode($letter_array) . '<br />';
