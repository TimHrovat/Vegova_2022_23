<form method="GET" action="script.php">
    <label for="kraj">KrajID</label>
    <input type="number" name="kraj" id="kraj" min="1000" max="9999" required /><br />
    <label for="ime">Ime kraja</label>

    <input type="text" id="ime" name="ime" minlength="3" maxlength="20" required pattern="[A-ZČŠŽa-zčšž\s]+" /> <br />
    <input type="submit" value="Vnos" />
</form>