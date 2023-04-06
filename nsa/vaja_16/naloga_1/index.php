<fieldset>
    <legend>Vnos podatkov za banko</legend>
    <form method="get" action="update.php">
        <select name="bank" id="bank">
            <?php
                require_once("banke.php");

                foreach ($t as $banka => $value) {
                    echo '<option value="'.$banka.'">'.$banka.'</option>';
                }
            ?>
        </select><br>
        <input type="number" placeholder="leto" name="leto" min="2010" max="2023" /><br>
        <input type="number" placeholder="saldo" name="saldo" /><br>
        <input type="number" placeholder="zaposleni" name="zaposleni" /><br>
        <input type="number" placeholder="dokapitalizacija" name="dokapitalizacija" /><br>
        <input type="submit" value="dodaj" />
    </form>
</fieldset>