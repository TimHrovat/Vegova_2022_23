<?php

require_once("utils.php");

$mysqli = connect();

$query = "SELECT geslo, status FROM Uporabnik WHERE uime = ?;";

$stmt = $mysqli->prepare($query);

$stmt->bind_param("s", $_POST["username"]);

$res = $stmt->execute();

$user = $stmt->get_result()->fetch_assoc();

if (!$user || md5($_POST["password"]) !== $user["password"]) {
    exit("wrong username or password");
}

session_start();

$_SESSION["username"] = $user["username"];
$_SESSION["status"] = $user["status"];

if ($user["status"] === "A") {
    header("location: brisi.php");
    exit();
}

header("location: izpis.php");
