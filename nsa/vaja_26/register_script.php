<?php

require_once("utils.php");
require_once("register.php");

$mysqli = connect();

$query = "INSERT INTO Uporabnik VALUES (?, ?, 0, now())";

$stmt = $mysqli->prepare($query);

$password = sha1($_POST["password"]);
$username = $_POST["username"];

$stmt->bind_param("ss", $username, $password);

$stmt->execute();

if ($stmt->error) {
    exit("pri keiranju vašega računa je prišlo do napake");
}

header("login.php");