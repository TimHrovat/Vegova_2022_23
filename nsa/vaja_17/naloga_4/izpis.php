
<?php

$beseda = $_GET["beseda"];

if ($_GET["tip"] === "sog") {
    if (preg_match("/[aeiou]+/", $beseda)) {
        echo "$beseda je veljavna beseda";
        return;
    }
    echo "$beseda ni veljavna beseda";
} else {
    $samcount = 0;
    $split = str_split($beseda);
    foreach ($split as $crka) {
        if (preg_match("/[aeiou]/", $crka)) {
            $samcount++;
        }
    }

    if ($samcount > strlen($beseda) / 2) {
        echo "$beseda je veljavna beseda";
        return;
    }

    echo "$beseda ni veljavna beseda";
}
