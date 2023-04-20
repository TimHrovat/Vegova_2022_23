<?php
session_start();

if (isset($_SESSION["uime"])) {
    unset($_SESSION);
    session_destroy();
}

header("location: prijava.php");
?>
