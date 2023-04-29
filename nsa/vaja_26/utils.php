<?php

function connect() {
    mysqli_report(MYSQLI_REPORT_OFF);

    $mysqli = new mysqli("localhost", "root", "", "dijaki");

    if ($mysqli->connect_error) {
        exit("prišlo je do napake pri povezavi do strežnika");
    }

    return $mysqli;
}

function check_access() {
    if (session_status() === PHP_SESSION_NONE) {
        header("location: login.php");
        exit("nimaš dostopa");
    }

    if (!isset($_SESSION["username"])) {
        header("location: login.php");
        exit("nimaš dostopa");
    }
}