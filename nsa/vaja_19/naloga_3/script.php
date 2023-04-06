<style>
    table,
    tr,
    td {
        border-collapse: collapse;
        border: 1px solid black;
        text-align: center;
    }

    td {
        padding: 0 10px;
    }

    thead {
        background: #dbdbdb;
        font-weight: bold;
    }
</style>
<?php

$con = mysqli_connect("localhost", "root", "", "bazaOseb");
$stmt = mysqli_stmt_init($con);

$q = 'select * from Oseba where CONCAT(".", KID, ".", spol, ".", EXTRACT(YEAR FROM rojstvo), ".") LIKE ?';
mysqli_stmt_prepare($stmt, $q);
$input = "%." . $_GET["KID"] . ".%" . $_GET["spol"] . ".%" . $_GET["letnica"] . ".%";
mysqli_stmt_bind_param($stmt, "is", $input);

mysqli_stmt_execute($stmt);
$rsp = mysqli_stmt_get_result($stmt);

echo '<table>';

while ($x = mysqli_fetch_assoc($rsp)) {
    echo '<tr>';
    foreach ($x as $pod) {
        echo '<td>' . $pod . '</td>';
    }
    echo '</tr>';
}

echo '</table>';
