<?php

require_once("utils.php");
require_once("login.php");

$mysqli = connect();

$find_user_q = "SELECT geslo FROM Uporabnik WHERE imeUporabnika = ?";

$find_user_stmt = $mysqli->prepare($find_user_q);

$find_user_stmt->bind_param("s", $_POST["username"]);

$find_user_stmt->execute();

if ($find_user_stmt->error) {
    exit("prišlo je do napake pri vpisu");
}

$user = $find_user_stmt->get_result()->fetch_assoc();

if (sha1($_POST["password"]) !== $user["password"]) {
    exit("napačno uporabniško ime ali geslo");
}

$update_user_q = "UPDATE Uporabnik SET steviloDostopov = steviloDostopov + 1, datumZadnjegaDostopa = now() WHERE imeUporabnika = ?";

$update_user_stmt = $mysqli->prepare($update_user_q);

$update_user_stmt->bind_param("s", $_POST["username"]);

$update_user_stmt->execute();

if ($update_user_stmt->error) {
    exit("prišlo je do napake pri vpisu");
}

session_start();

$_SESSION["username"] = $_POST["username"];

header("location: menu.php");
