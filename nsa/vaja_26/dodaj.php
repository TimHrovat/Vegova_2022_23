<?php

require_once("utils.php");

check_access();

$mysqli = connect();

$schools_q = "SELECT SID, imeSole FROM Sola";

$schools = $mysqli->query($schools_q);

if ($mysqli->error) {
    exit("prišlo je do napake");
}

?>

<form action="dodaj_script.php" method="post">
    <input type="number" name="id" placeholder="did" maxlength="20" />
    <input type="text" name="ime" placeholder="ime" maxlength="30" />
    <input type="text" name="priimek" placeholder="priimek" />
    <select name="school">
        <?php while ($school = $schools->fetch_assoc()) { ?>
            <option value="<?= $school["SID"] ?>"><?= $school["imeSole"] ?></option>
        <?php } ?>
    </select><br />
    <fieldset>
        <legend>spol</legend>
        z <input type="radio" name="spol" value="z" />
        m <input type="radio" name="spol" value="m" />
    </fieldset>
    <input type="submit" value="dodaj" />
</form> <br />