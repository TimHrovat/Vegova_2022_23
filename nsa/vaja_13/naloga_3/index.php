<fieldset class="">
    <form method="get" action="program.php">
            <label for="st">Število:</label>
            <input type="number" name="st" oninvalid="this.setCustomValidity('Vpišite celo število')" oninput="this.setCustomValidity('')" required />
            <br />

            <fieldset>
                <legend>Izberi sodost/lihost: </legend>
                <label for="sode">Sode</label>
                <input type="radio" name="type" id="sode" value="sode" required />
                <label for="lihe">Lihe</label>
                <input type="radio" name="type" id="lihe" value="lihe" required />
                <br />
            </fieldset>

            <input type="submit" value="briši števke" />
    </form>
</fieldset>

<style>
    fieldset {
        width: 300px;
        margin: 10px 0;
        padding: 8px;
    }
</style>