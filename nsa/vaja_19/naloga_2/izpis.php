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

$conn = mysqli_connect("localhost", "root", "", "bazaOseb");

$q = "SELECT * FROM Oseba o INNER JOIN Kraj k ON k.KID = o.KID ORDER BY o.ime";

$rs = mysqli_query($conn, $q);

echo '<table><thead><th><td colspan="9">Osebe</td></th></thead><tbody>';

while ($x = mysqli_fetch_assoc($rs)) {
    echo "<tr>";
    echo '<td>' . $x["id"] . '</td>';
    echo '<td>' . $x["ime"] . '</td>';
    echo '<td>' . $x["priimek"] . '</td>';
    echo '<td>' . $x["email"] . '</td>';
    echo '<td>' . $x["opis"] . '</td>';
    echo '<td>' . $x["KID"] . '</td>';
    echo '<td>' . $x["imeKraja"] . '</td>';
    echo "</tr>";
}

echo '</tbody></table>';

mysqli_close($conn);
