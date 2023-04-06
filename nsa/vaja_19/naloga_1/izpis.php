<style>
    table,
    tr,
    td {
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>'

<?php

$conn = mysqli_connect("localhost", "root", "", "bazaOseb");

echo '<table>';
echo '<tr><td colspan="2">Kraji</td></tr>';

$q = 'SELECT * FROM Kraj ORDER BY imeKraja';
$rs = mysqli_query($conn, $q);

while ($x = mysqli_fetch_assoc($rs))
    echo '<tr><td>' . $x["KID"] . '</td><td>' . $x["imeKraja"] . '</td></tr>';

echo '</table>';

mysqli_close($conn);
