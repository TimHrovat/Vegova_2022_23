<?php
if (isset($_GET["kraj"])) $kraj = $_GET["kraj"];
else return;
if (isset($_GET["imeKraja"])) $imeKraja = $_GET["ime"];
else return;

if (!preg_match("/^[1-9][0-9]{3}$/", $kraj)) {
    echo "Napaka pri validaciji podatkov na strani strežnika, kraj";
    return;
}

if (!preg_match("/^[A-ZČŠŽa-zčšž\s]{3,20}$/", $imeKraja)) {
    echo "Napaka pri validaciji podatkov na strani strežnika, ime kraja";
    return;
}

$con = mysqli_connect("localhost", "root", "", "bazaOseb");
$stmt = mysqli_stmt_init($con);
$q = "insert into Kraj values (?, ?)";
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, "is", $kraj, $imeKraja);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo 'Zapis je dodan';
} else {
    echo 'Napaka pri dodajanju zapisa';
}
