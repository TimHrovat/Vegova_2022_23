<?php
require_once("utils.php");

function register()
{
    if (!isset($_POST["username"]) || !isset($_POST["password"]))
        return;

    $mysqli = connect();

    $query = "INSERT INTO uporabnik VALUES (?, ?);";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("ss", $_POST["username"], sha1($_POST["password"]));

    $stmt->execute();

    if (!$stmt->fetch()) {
        echo "registration failed";
        return;
    }

    header("location: login.php");
}
?>

<form action="register.php" method="post">
    <input type="text" name="username" placeholder="Username" minlenght="3" required /><br />
    <input type="password" name="password" placeholder="Password" minlenght="3" required /><br />
    <?php echo register() ?>
    <input type="submit" value="register" />
</form>