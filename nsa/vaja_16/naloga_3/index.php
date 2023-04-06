<fieldset>
    <legend>Izberi leto</legend>
    <form method="get" action="izpis.php">
        Banka
        <div>
            <input type="radio" id="bank_nar" name="bank_sort" value="nar" checked>
            <label for="bank_nar">Naraščajoče</label><br>
            <input type="radio" id="bank_pad" name="bank_sort" value="pad">
            <label for="bank_pad">Padajoče</label><br>
        </div>
        Saldo
        <div>
            <input type="radio" id="saldo_nar" name="saldo_sort" value="nar" checked>
            <label for="saldo_nar">Naraščajoče</label><br>
            <input type="radio" id="saldo_pad" name="saldo_sort" value="pad">
            <label for="saldo_pad">Padajoče</label><br>
        </div>
        <input type="submit" value="razvrsti" />
    </form>
</fieldset>
<style>
    div {
        display: flex;
        flex-direction: row;
    }
</style>