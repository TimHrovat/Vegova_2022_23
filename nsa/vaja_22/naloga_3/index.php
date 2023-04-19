<style>
    table, tr, td {
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>

<form action="izpis.php" method="GET">
    <label for="kraj">Kraj</label>
    <select name="kraj">
        <?php
        $mysqli = new mysqli("localhost", "root", "", "GeodetskaUprava");

        if ($mysqli->connect_errno) {
            exit();
        }

        $res = $mysqli->query("SELECT DISTINCT kraj FROM stavba ORDER BY kraj ASC");

        while ($row = $res->fetch_assoc()) {
            echo '<option value="' . $row["kraj"] . '">' . $row["kraj"] . '</option>';
        }

        $res->close();
        $mysqli->close();
        ?>
    </select></br>
    <label for="osebe">Število oseb</label>
    <input type="number" min="0" step="1" name="osebe" id="osebe" required /> <br />
    <input type="submit" value="izpis" />
</form>