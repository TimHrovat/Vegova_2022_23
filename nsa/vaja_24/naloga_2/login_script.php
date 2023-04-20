<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "geodetskaUprava") or die("error");
$stmt = mysqli_stmt_init($conn);

if (!preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/", $_POST["geslo"])) {
    echo 'Geslo mora vsebovati vsaj eno števko in eno črko';
}

$q = 'SELECT imeUporabnika, geslo, stNeuspesnihPrijav FROM Uporabnik WHERE imeUporabnika = ?';

mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, "s", $_POST["uime"]);
mysqli_stmt_execute($stmt);

$rs = mysqli_stmt_get_result($stmt);
$x = mysqli_fetch_assoc($rs);

if (count($x) > 0) {
    // user obstaja
    if ($x["stNeuspesnihPrijav"] >= 6) {
        echo 'Vaš račun je blokiran, obrnite se na skrbnika sistema.';
        return;
    }

    if (password_verify($_POST["geslo"], $x["geslo"])) {
        $q = 'UPDATE Uporabnik SET stNeuspesnihPrijav = 0';
        mysqli_stmt_prepare($stmt, $q);
        mysqli_stmt_execute($stmt);

        $_SESSION["uime"] = $_POST["uime"];
        header("location: meni.php");
    } else {
        // napacno geslo, user obstaja
        $q = 'UPDATE Uporabnik SET stNeuspesnihPrijav = stNeuspesnihPrijav + 1';
        mysqli_stmt_prepare($stmt, $q);
        mysqli_stmt_execute($stmt);
    }
}
?>
