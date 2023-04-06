<?php

$post = $_POST;

function count2($arr) {
    $count = 0;
    foreach ($arr as $val) {
        $count++;
    }

    return $count;
}

echo "Ime in priimek: " . $post["ime"] . " " . $post["priimek"];
echo "<br/>";

echo "Program: " . $post["program"];
echo "<br/>";

echo "Tuji jeziki (" . count2($post["jeziki"]) . "): ";
foreach ($_POST["jeziki"] as $val) {
    echo $val . ", ";
}
echo "<br/>";

echo "Športi (" . count2($post["sport"]) . "): ";
foreach ($_POST["sport"] as $val) {
    echo $val . ", ";
}
echo "<br/>";

echo "Glasbeni tipi (" . count2($post["glasba"]) . "): ";
foreach ($_POST["glasba"] as $val) {
    echo $val . ", ";
}
echo "<br/>";


