<form method="POST" action="">
    <label>Vnesite številko kvadranta:</label>
    <input type="text" name="kvadrant" />
    <br /><br />
    <input type="submit" name="submit" value="Izbriši točke" />
</form>


<?php
$conn = mysqli_connect("localhost", "root", "", "geometrija");

if (isset($_POST['submit'])) {
    if (!empty($_POST['kvadrant'])) {
        $kvadrant = mysqli_real_escape_string($conn, $_POST['kvadrant']);
        $sql = "DELETE FROM Tocke2D WHERE kvadrant = $kvadrant";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_affected_rows($conn);
        echo "Število izbrisanih točk = $num_rows";
    } else {
        echo "Prosim, vnesite številko kvadranta.";
    }
}

mysqli_close($conn);
?>