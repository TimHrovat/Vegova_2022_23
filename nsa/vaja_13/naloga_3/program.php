<?php 

$numbers = str_split($_GET["st"]);

$comparisonVal = $_GET["type"] === "sode" ? 0 : 1;

$numCount = count($numbers);

for ($i = 0; $i < $numCount; $i++) {
    if ($numbers[$i] % 2 !== $comparisonVal)
        continue;

    unset($numbers[$i]);
}

echo implode($numbers);

echo '<br/><a href="index.php">nazaj</a>';