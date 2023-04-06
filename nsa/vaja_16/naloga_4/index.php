<fieldset>
    <legend>Izberi statistične podatke</legend>

    <form action="izpis.php" method="get" >
        <label for="dokapitalizacija">Vsota dokapitalizacije</label>
        <input type="checkbox" name="dokapitalizacija" id="dokapitalizacija" /><br/>

        <label for="zaposleni">Povprečno število zaposlenih</label>
        <input type="checkbox" name="zaposleni" id="zaposleni"/><br/>

        <label for="saldo">Povprečno saldo</label>
        <input type="checkbox" name="saldo" id="saldo" /><br/>

        <input type="submit" value="izpis" />
    </form>
</fieldset>