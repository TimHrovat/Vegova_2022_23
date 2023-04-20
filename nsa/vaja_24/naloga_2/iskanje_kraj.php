<?php
session_start();

if (!isset($_SESSION["uime"])) {
    header("location: prijava.php");
}
?>
<form action="iskanje2Skripta.php" method="GET">
    <fieldset style="display:inline-block">
        <legend>Izpis Stanovanj</legend>
        Kraj:
        <select name="kraj">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "geodetskauprava");

            $q = "SELECT DISTINCT Kraj FROM stavba";

            $rs = mysqli_query($conn, $q);

            while ($x = mysqli_fetch_assoc($rs))
                echo '<option value="' . $x["Kraj"] . '">' . $x["Kraj"] . '</option>';

            mysqli_close($conn);
            ?>
        </select>
        <br />
        <input type="submit" value="Izpis" />
    </fieldset>
</form>