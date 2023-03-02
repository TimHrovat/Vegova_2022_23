<?php
if (
    !preg_match("/^[1-9][0-9]*$/", $_GET["id"])
    || !preg_match("/^[A-PR-VZČŠŽ][A-PR-VZa-pr-vzČŠŽčšž\s]{2,9}$/", $_GET["ime"])
    || !preg_match("/^[A-PR-VZČŠŽ][A-PR-VZa-pr-vzČŠŽčšž\s]{2,19}$/", $_GET["priimek"])
    || $_GET["datum_roj"] < "1920-01-01" || $_GET["datum_roj"] > date("Y-m-d")
    || !preg_match("/^[1-9][0-9]*$/", $_GET["krajID"])
    || !preg_match("/^ [^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+$/", $_GET["email"])
) {
    echo "Napaka pri validaciji podatkov na strani strežnika";
    return;
}

$con = mysqli_connect("localhost", "root", "", "bazaOseb");
$stmt = mysqli_stmt_init($con);

if (isset($_GET["opis"])) {
    $q = "insert into Oseba values (?, ?, ?, ?, ?, ?, ?, ?)";
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param(
        $stmt,
        "isssisss",
        $_GET["id"],
        $_GET["ime"],
        $_GET["priimek"],
        $_GET["datum_roj"],
        $_GET["krajID"],
        $_GET["spol"],
        $_GET["email"],
        $_GET["opis"]
    );
    mysqli_stmt_execute($stmt);
} else {
    $q = "insert into Oseba values (?, ?, ?, ?, ?, ?, ?, NULL)";
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param(
        $stmt,
        "isssiss",
        $_GET["id"],
        $_GET["ime"],
        $_GET["priimek"],
        $_GET["datum_roj"],
        $_GET["krajID"],
        $_GET["spol"],
        $_GET["email"]
    );
    mysqli_stmt_execute($stmt);
}

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo 'Zapis je dodan';
} else {
    echo 'Napaka pri dodajanju zapisa';
    printf("Error: %s.\n", mysqli_stmt_error($stmt));
}
