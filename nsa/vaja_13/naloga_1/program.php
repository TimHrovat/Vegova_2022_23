<?php

function rightData() {
    echo "<p>Ime in priimek: ".$_GET["name"]." ".$_GET["surname"]."</p>";
    echo "<p>Program: ".$_GET["programme"]."</p>";
}

function falseName() {
    echo "<p>Ime: ".ucfirst(strtolower($_GET["name"]))." (<span style='color:red;'>".$_GET["name"]."</span>)</p>";
    echo "<p>Priimek: ".$_GET["surname"]."</p>";
    echo "<p>Program:".$_GET["programme"]."</p>";
}
function falseSurname() {
    echo "<p>Ime: ".$_GET["name"]."</p>";
    echo "<p>Priimek: ".ucfirst(strtolower($_GET["surname"]))." (<span style='color:red;'>".$_GET["surname"]."</span>)</p>";
    echo "<p>Program:".$_GET["programme"]."</p>";
}

if (!ctype_upper($_GET["name"][0])) 
    falseName();
else if (!ctype_upper($_GET["surname"][0])) 
    falseSurname();
else rightData();