<?php

$conn = mysqli_connect("localhost", "root", "", "geometrija");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Tocke2D";
$result = mysqli_query($conn, $sql);

?>

<form method="post" action="">
    <label for="tocka1">Izberi prvo točko:</label>
    <select name="tocka1" id="tocka1">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["x"] . "," . $row["y"] . "'>" . $row["x"] . ", " . $row["y"] . "</option>";
        }
        ?>
    </select>
    <br><br>
    <label for="tocka2">Izberi drugo točko:</label>
    <select name="tocka2" id="tocka2">
        <?php
        mysqli_data_seek($result, 0);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["x"] . "," . $row["y"] . "'>" . $row["x"] . ", " . $row["y"] . "</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" name="submit" value="Izračunaj razdaljo">
</form>

<?php

if (isset($_POST['submit'])) {
    $tocka1 = explode(",", $_POST['tocka1']);
    $tocka2 = explode(",", $_POST['tocka2']);

    $razdalja = sqrt(pow(($tocka2[0] - $tocka1[0]), 2) + pow(($tocka2[1] - $tocka1[1]), 2));

    echo "Razdalja med točkama (" . $tocka1[0] . ", " . $tocka1[1] . ") in (" . $tocka2[0] . ", " . $tocka2[1] . ") je " . $razdalja . ".";
}
