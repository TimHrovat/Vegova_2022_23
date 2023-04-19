<?php
require_once("utils.php");

function login()
{
    if (!isset($_POST["username"]) || !isset($_POST["password"]))
        return;

    $mysqli = connect();

    $query = "SELECT geslo status FROM Uporabnik WHERE uime = ?;";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $_POST["username"]);

    $stmt->execute();

    $res = $stmt->get_result();

    $user = $res->fetch_row();

    if (!$user || sha1($_POST["password"]) !== $user["geslo"]) {
        return ("wrong username or password");
    }

    session_start();

    $_SESSION["username"] = $user["username"];

    header("location: menu.php");
}
?>

<form action="login.php" method="post">
    <input type="text" name="username" placeholder="Username" minlenght="3" required /><br />
    <input type="password" name="password" placeholder="Password" minlenght="3" required /><br />
    <?php echo login() ?>
    <input type="submit" value="login" />
</form>