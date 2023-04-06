<form action="izpis.php" method="post">
    <input type="text" name="ime" placeholder="ime" required/><br />
    <input type="text" name="priimek" placeholder="priimek" required/><br />

    <br />

    <label for="gimnazija">Gimnazija</label>
    <input type="radio" name="program" id="gimnazija" value="gimnazija" /><br />
    <label for="strokovna">Srednja strokovna šola</label>
    <input type="radio" name="program" id="strokovna" value="strokovna" /><br />
    <label for="drugo">Drugo</label>
    <input type="radio" name="program" id="drugo" value="drugo" /><br />

    <br />

    <label for="anglescina">Angleščina</label>
    <input type="checkbox" id="anglescina" name="jeziki[]" value="angleščina" /><br />
    <label for="spain">Španščina</label>
    <input type="checkbox" id="spain" name="jeziki[]" value="španščina" /><br />
    <label for="nem">Nemščina</label>
    <input type="checkbox" id="nem" name="jeziki[]" value="nemščina" /><br />
    <label for="franc">Francoščina</label>
    <input type="checkbox" id="franc" name="jeziki[]" value="francoščina" /><br />
    <label for="drugo">Drugo</label>
    <input type="checkbox" id="drugo" name="jeziki[]" value="drugo" /><br />

    <br />

    <label for="sport">Izberi šport:</label>
    <select multiple="multiple" name="sport[]" id="sport">
        <option value="atletika">Atletika</option>
        <option value="smučanje">Smučanje</option>
        <option value="plavanje">Plavanje</option>
        <option value="drugo">Drugo</option>
    </select>

    <br />
    <br />

    <label for="glasba">Izberi glasbeno zvrst:</label>
    <select multiple name="glasba[]" id="glasba">
        <option value="klasika">Klasika</option>
        <option value="pop">Pop</option>
        <option value="rock">Rock</option>
        <option value="jazz">Jazz</option>
        <option value="ne_maram_glasbe">Ne maram glasbe</option>
    </select>

    <input type="submit" value="submit" />
    <input type="reset" value="reset" />
</form>