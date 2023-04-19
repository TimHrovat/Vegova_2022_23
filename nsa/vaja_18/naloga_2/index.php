<?php
require_once 'baza.php';

$priimek = isset($_GET['priimek']) ? $_GET['priimek'] : null;

if ($priimek) {
    $conn = new mysqli("127.0.0.1", "root", null, "bazaOseb");

    $query = "SELECT * FROM oseba o INNER JOIN kraj k ON o.KID = k.KID WHERE priimek = ? ORDER BY ime";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $priimek);
    $stmt->execute();
    $osebe = $stmt->get_result();

    $conn->close();
}
?>

<style>
    table, th, td {
        margin-top: 16px;
        border-collapse: collapse;
        border: 1px solid black;
        padding: 5px;
    }
</style>

<body>

    <form action="naloga_2.php">
        Priimek
        <input type="text" name="priimek" value="<?= $priimek ?>" required>
        <button type="submit">Išči</button>
    </form>

    <table>
        <thead>
            <th colspan="7"><?= $priimek ?></th>
        </thead>
        <tbody>
            <?php if (isset($osebe)) while ($oseba = $osebe->fetch_assoc()) { ?>
                <tr>
                    <td><?= $oseba['id'] ?></td>
                    <td><?= $oseba['ime'] ?></td>
                    <td><?= $oseba['priimek'] ?></td>
                    <td><?= $oseba['spol'] ?></td>
                    <td><?= $oseba['opis'] ?></td>
                    <td><?= $oseba['KID'] ?></td>
                    <td><?= $oseba['imeKraja'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>