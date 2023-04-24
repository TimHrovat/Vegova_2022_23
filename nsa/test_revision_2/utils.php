<?php

function connect()
{
    $mysqli = new mysqli("localhost", "root", "", "matura");

    if ($mysqli->connect_error) {
        exit("connection error");
    }

    return $mysqli;
}

// $allowed_user_status je array statusov, ki so dovoljeni za to stran
function check_access($allowed_user_status) {
    if (session_status() === PHP_SESSION_NONE) {
        header("location: login.php");
        exit();
    }

    if (!isset($_SESSION["username"]) || !isset($_SESSION["status"])) {
        header("location: login.php");
        exit();
    }

    if (!in_array($_SESSION["status"], $allowed_user_status)) {
        header("location: login.php");
        exit();
    }
}
