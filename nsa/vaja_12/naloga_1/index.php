<?php

function generateNumbers($n, $a, $b)
{
    $numbers = array();
    $del3 = array();
    $ostala = array();

    for ($i = 0; $i < $n; $i++) {
        $number = rand($a, $b);
        $numbers[] = $number;

        if ($number % 3 == 0) {
            $del3[] = $number;
        } else {
            $ostala[] = $number;
        }
    }

    return array('numbers' => $numbers, 'del3' => $del3, 'ostala' => $ostala);
}

$n = rand(30, 50);
$a = rand(100, 150);
$b = rand(250, 300);

$result = generateNumbers($n, $a, $b);
$numbers = $result['numbers'];
$del3 = $result['del3'];
$ostala = $result['ostala'];

$countDel3 = count($del3);
$countOstala = count($ostala);

$maxDel3 = ($countDel3 > 0) ? max($del3) : 0;
$maxOstala = ($countOstala > 0) ? max($ostala) : 0;

echo "Število elementov v tabeli \$del3: $countDel3\n";
echo "Število elementov v tabeli \$ostala: $countOstala\n";
echo "Največje število v tabeli \$del3: $maxDel3\n";
echo "Največje število v tabeli \$ostala: $maxOstala\n";
