<?php

function findFirstWord($word)
{
    $letters = str_split($word);
    sort($letters);

    return implode($letters);
}


function findLastWord($word)
{
    $letters = str_split($word);
    rsort($letters);

    return implode($letters);
}

function izbrisiSam($word)
{
    $sam = array('A', 'E', 'I', 'O', 'U');
    $letters = str_split($word);
    $newWord = '';

    foreach ($letters as $letter) {
        if (!in_array($letter, $sam)) {
            $newWord .= $letter;
        }
    }

    return $newWord;
}

function generateRandomWord($length)
{
    $letters = range('A', 'Z');
    $word = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = array_rand($letters);
        $letter = $letters[$randomIndex];
        $word .= $letter;
    }

    return $word;
}

$length = 10;
$word = generateRandomWord($length);
echo "Beseda: " . $word;
echo "Prva beseda: " . findFirstWord($word);
echo "Zadnja beseda: " . findLastWord($word);
echo "Bres samoglasnikov: " . izbrisiSam($word);
