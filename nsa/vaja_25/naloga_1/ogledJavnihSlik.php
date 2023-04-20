<?php

session_start();
if (!isset($_SESSION["uime"])) header("location: prijava.php");

if (isset($_GET["ime"])) $ime = $_GET["ime"];
else return;

$conn = mysqli_connect("localhost", "root", "", "galerija");
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, "SELECT d.dID, d.imeDatoteke FROM datoteka d
INNER JOIN Objava o ON o.dID = d.dID
WHERE d.javna = 1 AND o.uName = ?");
mysqli_stmt_bind_param($stmt, "s", $ime);
mysqli_stmt_execute($stmt);

$rs = mysqli_stmt_get_result($stmt);

echo "<h2>Javne slike - $ime</h2>";
while ($x = mysqli_fetch_assoc($rs)){
    $pot = "$ime/Slike/".$x["imeDatoteke"];
    if (file_exists($pot)) {
        echo $x["imeDatoteke"] . '<br>';
        echo "<img src='$pot' height='200'><br>";
    }
}
?>
