<fieldset>
    <legend>Farenheit/Celzij konverter</legend>
    <form action="izpis.php" method="get">
        <input type="number" name="temp" placeholder="temperatura" required />
        <select name="unit1" required>
            <option value="C">Celzij</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select>
        <select name="unit2" required>
            <option value="C">Celzij</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>F
        </select>
        <input type="submit" value="pretvori" />
    </form>
</fieldset>