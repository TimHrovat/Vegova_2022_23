<?php

require_once("index.php");

$kraj = isset($_GET['kraj']) ? $_GET['kraj'] : null;

$conn = new mysqli("localhost", "root", "", "bazaOseb");


$conn->close();

?>

<?php foreach ($kraj as $krajId) {
    $query = "SELECT * FROM kraj WHERE KID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $krajId);
    $stmt->execute();
    $kraj = $stmt->get_result()->fetch_assoc();

    $query = "SELECT * FROM oseba o INNER JOIN kraj k ON o.KID = k.KID WHERE o.KID = ? ORDER BY o.priimek, o.ime";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $krajId);
    $stmt->execute();
    $osebe = $stmt->get_result();
?>

    <table>
        <thead>
            <th colspan="7"><?= $izbranKraj['imeKraja'] ?></th>
        </thead>
        <tbody>
            <?php while ($oseba = $osebe->fetch_assoc()) { ?>
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
<?php } ?>