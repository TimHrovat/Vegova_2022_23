<form action="shrani.php" method="GET">
    <label for="stavba">Stavba</label>
    <select name="stavba">
        <?php
        $mysqli = new mysqli("localhost", "root", "", "GeodetskaUprava");

        if ($mysqli->connect_errno) {
            exit();
        }

        $res = $mysqli->query("SELECT * FROM stavba");

        while ($row = $res->fetch_assoc()) {
            $label = $res["StavbaID"] . " (" . $row["Kraj"] . ", " . $row["naslov"] . ")";
            echo '<option value="' . $row["StavbaID"] . '">' . $label . '</option>';
        }

        $res->close();
        $mysqli->close();
        ?>
        <option value="1">hello</option>
    </select></br>
    <label for="st_stanovanja">Številka stanovanja</label>
    <input type="number" min="1" step="1" name="st_stanovanja" id="st_stanovanja" required /> <br />
    <label for="povrsina">Površina</label>
    <input type="number" min="1" step=".01" name="povrsina" id="povrsina" required /> <br />
    <label for="osebe">Prijavljenih oseb</label>
    <input type="number" min="0" step="1" name="osebe" id="osebe" required /> <br />
    <label for="vrednost">Vrednost</label>
    <input type="number" min="1000" step=".01" name="vrednost" id="vrednost" required /> <br />
    <input type="submit" value="shrani" />
</form>