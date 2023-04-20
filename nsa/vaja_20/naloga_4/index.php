<?php

$conn = new mysqli("localhost", "root", "", "geometrija");

if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $barvaId = $_POST['barva'];

    $sql = "SELECT x, y FROM Tocke2D WHERE barvaID IN (SELECT barvaID FROM Barve WHERE barvaId = $barvaId)";

    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Iskanje točk po barvi</title>
</head>

<body>
    <h2>Iskanje točk po barvi</h2>
    <form method="post" action="">
        <label for="barva">Izberi barvo:</label>
        <select name="barva" id="barva">
            <?php
            $sql = "SELECT barvaId, barva FROM Barve";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["barvaId"] . "'>" . $row["barva"] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Išči">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        if ($result->num_rows > 0) {
            echo "<br><br><table><tr><th>X</th><th>Y</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["x"] . "</td><td>" . $row["y"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Ni bilo najdenih točk s to barvo.";
        }
    }
    ?>

</body>

</html>