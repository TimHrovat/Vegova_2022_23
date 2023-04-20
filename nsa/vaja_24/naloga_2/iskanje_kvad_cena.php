<?php
session_start();

if (!isset($_SESSION["uime"])) {
    header("location: prijava.php");
}
?>

<form action="iskanje1Skripta.php" method="GET">
    <fieldset style="display:inline-block">
        <legend>Iskanje stanovanja</legend>
        <div class="forma">
            <label for="kvad">Min. Kvadratura</label>
            <input type="number" min="0" name="kvad">
            <label for="raz1">Razvrsti</label>

            <input type="radio" name="raz1" value="nar" required />
            <label for="nar">naraščajoče</label>

            <input type="radio" name="raz1" value="pad" required />
            <label for="pad">padajoče</label>
            <br />

            <label for="cena">Min. Cena</label>
            <input type="number" min="0" name="cena">
            <label for="raz2">Razvrsti</label>
            <input type="radio" name="raz2" value="nar" required />
            <label for="nar">naraščajoče</label>
            <input type="radio" name="raz2" value="pad" required />
            <label for="pad">padajoče</label>
            <br />

            <input type="submit" value="poišči" />
        </div>
    </fieldset>
</form>