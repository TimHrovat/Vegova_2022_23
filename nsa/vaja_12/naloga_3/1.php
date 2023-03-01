<?php

function generateRandomWord($length) {
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
echo $word;
