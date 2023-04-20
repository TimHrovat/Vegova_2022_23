<?php

session_start();
if (!isset($_SESSION["uime"])) header("location: prijava.php");

$uime = $_SESSION["uime"];

echo '<h2>Slike</h2>';
foreach(glob("$uime/Slike/*.*") as $k => $v) {
    $d = stat($v);
    echo basename($v) . '<br>';
    echo "<img src=\"$v\" height=\"200\"/><br><br>";
}

echo '<h2>Ostalo</h2>';
foreach(glob("$uime/Ostalo/*.*") as $k => $v) {
    $d = stat($v);
    echo basename($v) . '<br>';
}

?>
