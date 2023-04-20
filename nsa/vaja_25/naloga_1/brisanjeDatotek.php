<?php
session_start();
if (!isset($_SESSION["uime"])) header("location: prijava.php");
$uime = $_SESSION["uime"];

$pot = "$uime/Slike";
$dir = opendir($pot);

echo '<h2>Slike</h2>';
while (false !== ($f = readdir($dir))) {
    if ($f != '.' && $f != '..'){
        echo "<a href='izbrisi.php?pot=$pot/$f'>$f</a><br>";
        echo "<img src='$pot/$f' height='200'/><br><br>";
    }
}

$pot = "$uime/Ostalo";
$dir = opendir($pot);

echo '<h2>Ostalo</h2>';
while (false !== ($f = readdir($dir))) {
    if ($f != '.' && $f != '..'){
        echo "<a href='izbrisi.php?pot=$pot/$f'>$f</a><br>";
    }
}
?>
