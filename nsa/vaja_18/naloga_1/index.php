<?php

require_once 'baza.php';

$conn = connect();

$kraji = $conn->query("SELECT * FROM kraj ORDER BY imeKraja");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 18</title>
</head>

<style>
    table, th, td, tr {
        border-collapse: collapse;
        border: 1px solid black;
        padding: 5px;
    }
</style>

<body>

    <table>
        <thead>
            <th colspan="2">Kraji</th>
        </thead>
        <tbody>
            <?php
            while ($kraj = $kraji->fetch_assoc()) { ?>
                <tr>
                    <td><?= $kraj['KID'] ?></td>
                    <td><?= $kraj['imeKraja'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>