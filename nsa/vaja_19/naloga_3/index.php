<form method="GET" action="script.php">
    <label for="KID">Kraj </label>
    <select name="KID" required>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "bazaOseb");

        $q = "SELECT * FROM kraj";

        $rsp = mysqli_query($conn, $q);

        while ($x = mysqli_fetch_assoc($rsp))
            echo '<option value="' . $x["KID"] . '">' . $x["imeKraja"] . '</option>';

        mysqli_close($conn);
        ?>
    </select> <br />

    <label for="spol">Spol</label>
    <input type="radio" name="spol" value="M">M</input>
    <input type="radio" name="spol" value="F">F</input> <br />

    <label for="letnica">Letnica rojstva</label>
    <input type="number" name="letnica" /> <br />

    <input type="submit" value="Izpis" />
</form>