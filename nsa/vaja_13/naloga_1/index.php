<fieldset>
    <legend>Vnos podatkov</legend>
    <form method="get" action="program.php">
        <label for="name">Ime</label>
        <input type="text" name="name" required />
        <br />

        <label for="surname">Priimek</label>
        <input type="text" name="surname" required />
        <br />

        <label for="gimnazija">Gimnazija</label>
        <input type="radio" name="programme" id="gimnazija" value="gimnazija" required />
        <label for="strok">Strokovna šola</label>
        <input type="radio" name="programme" id="strok" value="strokovna šola" required />
        <br />

        <input type="submit" value="submit">
        <input type="reset" value="reset">
    </form>
</fieldset>

<style>
    fieldset {
        width: 300px;
    }

    input[type=text] {
        width: 200px;

    }
</style>