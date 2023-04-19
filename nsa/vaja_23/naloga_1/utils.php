<?php

function connect() {
    $mysqli = new mysqli("localhost", "root", "", "GeodetskaUprava");

    if ($mysqli->connect_error) {
        exit("prišlo je do napake pri povezavi do baze");
    }

    return $mysqli;
}

function check_login() {
    if (session_status() === PHP_SESSION_NONE) {
        header("location: login.php");
        exit();
    }

    if (!isset($_SESSION["username"])) {
        header("location: login.php");
        exit();
    }

    echo '<a href="menu.php">Menu</a><br/>';
}

