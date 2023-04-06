<?php

require_once("banke.php");
require_once("index.php");

$data = $_GET;

if (array_key_exists($data["leto"], $t[$data["bank"]])) {
    echo 'Spreminjanje obstoječih podatkov ni možno';
    return;
};

$t[$data["bank"]][$data["leto"]] = ["saldo" => $data["saldo"], "zaposleni" => $data["zaposleni"], "dokapitalizacija" => $data["dokapitalizacija"]];

echo "<pre>";
print_r($t[$data["bank"]]);
echo "</pre>";