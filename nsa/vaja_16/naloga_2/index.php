<fieldset>
    <legend>Izberi leto</legend>
    <form method="get" action="izpis.php">
        <select name="leto" id="bank">
            <?php
            require_once("banke.php");


            foreach ($t["nlb"] as $leto => $podatki) {
                echo '<option value="' . $leto . '">' . $leto . '</option>';
            }

            ?>
        </select><br>
        <input type="submit" value="izpis" />
    </form>
</fieldset>