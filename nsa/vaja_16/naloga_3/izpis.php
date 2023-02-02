<?php

require_once("banke.php");
require_once("index.php");

function sortBanksNar($a, $b)
{
    if ($a["saldo"] > $b["saldo"]) return 1;
    if ($a["saldo"] < $b["saldo"]) return -1;
    return 0;
}

function sortBanksPad($a, $b)
{
    if ($a["saldo"] > $b["saldo"]) return -1;
    if ($a["saldo"] < $b["saldo"]) return 1;
    return 0;
}

if ($_GET["bank_sort"] === "nar")
    ksort($t);
else if ($_GET["bank_sort"] === "pad")
    krsort($t);

if ($_GET["saldo_sort"] === "nar")
    foreach ($t as &$data) {
        usort($data, "sortBanksNar");
    }
else if ($_GET["saldo_sort"] === "pad")
    foreach ($t as &$data) {
        usort($data, "sortBanksPad");
    }



echo "<pre>";
print_r($t);
echo "</pre>";
