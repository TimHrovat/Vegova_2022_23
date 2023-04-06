<form method="GET" action="script.php">
    <lable for="id">Kraj: </lable>
    <input type="number" name="id" min="1" required /><br />

    <lable for="ime">Ime: </lable>
    <input type="text" name="ime" minlength="3" maxlength="10" pattern="[A-PR-VZČŠŽ][A-PR-VZa-pr-vzČŠŽčšž\s]+" required /> <br />

    <lable for="priimek">Priimek: </lable>
    <input type="text" name="priimek" minlength="3" maxlength="20" pattern="[A-PR-VZČŠŽ][A-PR-VZa-pr-vzČŠŽčšž\s]+" required /> <br />

    <lable for="datum_roj">Datum rojstva: </lable>
    <input type="date" name="datum_roj" min="1920-01-01" max="<?php echo date("Y-m-d"); ?>" required /> <BR />

    <lable for="kraj">Kraj: </lable>
    <select id="Kraj" name="krajID" required>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "bazaOseb");

        $q = "SELECT * FROM kraj";

        $rsp = mysqli_query($conn, $q);

        while ($x = mysqli_fetch_assoc($rsp))
            echo '<option value="' . $x["KID"] . '">' . $x["imeKraja"] . '</option>';

        mysqli_close($conn);
        ?>
    </select> <br />

    <lable for="spol">Spol: </lable>
    <input type="radio" name="spol" value="M" checked>M</input>
    <input type="radio" name="spol" value="F">F</input> <br />

    <lable for="email">Email: </lable>
    <input type="email" name="email" required /> <br />

    <lable for="opis">Opis: </lable>
    <textarea type="text" name="opis" maxlength="150" rows="3" cols="40"></textarea> <br />

    <input type="submit" value="Shrani" />
</form>