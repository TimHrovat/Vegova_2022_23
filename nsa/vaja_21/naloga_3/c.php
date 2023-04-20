<!DOCTYPE html>
<html>

<head>
    <title>Iskanje točk</title>
</head>

<body>
    <h1>Iskanje točk</h1>
    <form action="" method="post">
        <label>Izberi barvo:</label>
        <input type="color" name="barva">
        <input type="submit" value="Išči">
    </form>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "geometrija");
    if ($conn->connect_error) {
        die("Povezava ni uspela: " . $conn->connect_error);
    }

    if (isset($_POST['barva'])) {
        $barva = $_POST['barva'];
        $barvaHex = str_replace("#", "", $barva);

        $sql = "SELECT * FROM Tocke2D WHERE barvaHex = '$barvaHex'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Točka (" . $row["x"] . ", " . $row["y"] . ") v kvadrantu " . $row["kvadrant"] . "<br>";
            }
        } else {
            echo "Ni rezultatov";
        }
    }

    if (isset($_POST['barva'])) {
        $barva = $_POST['barva'];
        $barvaHex = str_replace("#", "", $barva);
    }
    ?>

</body>

</html>