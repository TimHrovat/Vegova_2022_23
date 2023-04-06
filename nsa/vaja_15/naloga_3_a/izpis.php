<?php

require_once("index.php");

$get = $_GET;

echo "<fieldset>";

if (isset($get["cvf"])) {
    $res = $get["temp"] * 9 / 5 + 32;
    echo round($get["temp"], 2) . "ºC" . " = " . round($res, 2) . "ºF";
}

if (isset($get["fvc"])) {
    $res = ($get["temp"] - 32) * 5 / 9;
    echo round($get["temp"], 2) . "ºF" . " = " . round($res, 2) . "ºC";
}

echo "</fieldset>";
