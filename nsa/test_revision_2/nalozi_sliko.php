<?php
$mysqli = new mysqli("localhost", "root", "", "images");

if ($mysqli->connect_error) {
    exit("skill issue");
}

if (isset($_POST["img"])) {
    $folder = "./images/";
    $tmpname = $_FILES["img"]["tmp_name"];
    $name = $_FILES["img"]["name"];

    if (move_uploaded_file($tmpname, $folder . $name)) {
        $query = "INSERT INTO image VALUES (?)";

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param("s", $name);

        $stmt->execute();

        if ($stmt->error) {
            unlink($folder . $name);
            echo "there was an error uploading the image";
            exit();
        }

        echo "file upload successful";
    } else {
        echo "file upload unsuccessful";
    }
}


?>


<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="img" accept=".png, .jpg" required />
    <input type="submit" value="upload" />
</form>

<?php
$query = "SELECT * FROM image";

$res = $mysqli->query($query);

while ($row = $res->fetch_assoc()) {
?>
    <img src="./images/<?= $row["name"] ?>" />
<?php } ?>