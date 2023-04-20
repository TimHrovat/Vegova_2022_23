<?php
session_start();

if (!isset($_SESSION["uime"])) {
    header("location: prijava.php");
}

if (isset($_POST["vidnost"])) $vidnost = $_POST["vidnost"] == "javna" ? 1 : 0;
else return;

$conn = mysqli_connect("localhost", "root", "", "galerija");
$stmt = mysqli_stmt_init($conn);

// var_dump($_FILES);

$finfo = finfo_open(FILEINFO_MIME_TYPE);
// echo finfo_file($finfo, $_FILES["dat"]["tmp_name"]) . '<br>';

if (isset($_POST["prepisi"])) $prepisi = true;
else $prepisi = false;

// echo '<br>';

$uime = $_SESSION["uime"];

$pot;
if (str_starts_with(finfo_file($finfo, $_FILES["dat"]["tmp_name"]), "image")) $pot = "/Slike/";
else $pot = "/Ostalo/";

$velikost = 0;
foreach(glob("$uime/Slike/*.*") as $k => $v) {
    $d = stat($v);
    $velikost += $d["size"];
}
foreach(glob("$uime/Ostalo/*.*") as $k => $v) {
    $d = stat($v);
    $velikost += $d["size"];
}

$velikost += $_FILES["dat"]["size"];

// var_dump($velikost);
// echo $uime . $pot . $_FILES["dat"]["name"];

if ($velikost > 2e7) {
        echo 'Disk je poln. Pred nalaganjem izbrišite nekaj obstoječih datotek.';
        return;
}

// var_dump($vidnost);

echo '<br>';
if (file_exists("$uime" . $pot . $_FILES["dat"]["name"])) {
    if ($prepisi) {
        move_uploaded_file($_FILES["dat"]["tmp_name"], $uime . $pot . $_FILES["dat"]["name"]);

        //Posodobimo database
        mysqli_stmt_prepare($stmt, "SELECT d.dID FROM datoteka d INNER JOIN Objava o ON o.dID = d.dID WHERE d.imeDatoteke = ? AND o.uName = ?");
        mysqli_stmt_bind_param($stmt, "ss", $_FILES["dat"]["name"], $_SESSION["uime"]);
        mysqli_stmt_execute($stmt);

        $did = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))["dID"];

        mysqli_stmt_prepare($stmt, "UPDATE datoteka SET javna = ? WHERE dID = ?");
        mysqli_stmt_bind_param($stmt, "ii", $vidnost, $did);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_prepare($stmt, "UPDATE objava SET datum = current_date WHERE dID = ?");
        mysqli_stmt_bind_param($stmt, "i", $did);
        mysqli_stmt_execute($stmt);

        foreach(glob("$uime/$pot/*.*") as $k => $v) {
            $d = stat($v);
            echo basename($v) . '<br>';
            echo "<img src=\"$v\" height=\"200\"/><br><br>";
        }
    } else {
        echo 'Datoteka že obstaja';
        return;
    }
} else {
    move_uploaded_file($_FILES["dat"]["tmp_name"], $uime . $pot . $_FILES["dat"]["name"]);

    // Novo v database
    mysqli_stmt_prepare($stmt, "INSERT INTO datoteka VALUES(DEFAULT, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sii", $_FILES["dat"]["name"], $vidnost, $_POST["tip"]);
    mysqli_stmt_execute($stmt);

    $rs = mysqli_query($conn, "SELECT dID FROM datoteka ORDER BY dID DESC LIMIT 1");
    $did = mysqli_fetch_assoc($rs)["dID"];

    mysqli_stmt_prepare($stmt, "INSERT INTO Objava VALUES(?, ?, current_date)");
    mysqli_stmt_bind_param($stmt, "si", $_SESSION["uime"],  $did);
    mysqli_stmt_execute($stmt);

    foreach(glob("$uime/$pot/*.*") as $k => $v) {
        $d = stat($v);
        echo basename($v) . '<br>';
    }
}


?>
