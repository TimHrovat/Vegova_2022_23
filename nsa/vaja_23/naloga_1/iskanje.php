<?php

require_once("utils.php");

check_login();

function search()
{
    if (!isset($_GET["kvadratura"]) && !isset($_GET["cena"]))
        return null;

    $mysqli = connect();

    if (isset($_GET["kvadratura"]) && isset($_GET["cena"])) {
        $where = "stan.kvadratura >= ? AND stan.cena >= ?";
    } else if (isset($_GET["kvadratura"])) {
        $where = "stan.kvadratura >= ?";
    } else if (isset($_GET["cena"])) {
        $where = "stan.cena >= ?";
    }

    $order_options = ["asc", "desc"];

    if (!in_array($_GET["sort_kvadratura"], $order_options) || !in_array($_GET["sort_cena"], $order_options))
        return null;


    $query = 'SELECT stav.kraj AS kraj, stav.naslov AS naslov, stav.stavbaid AS stavbaid,
                stan.zap_st AS zapst, stan.kvadratura AS kvadratura, stan.cena AS cena
              FROM stanovanje stan
              INNER JOIN stavba stav ON stav.stavbaid = stan.stavbaid
              WHERE ' . $where . ' ORDER BY stav.kvadratura ' . $_GET["sort_kvadratura"] . ', stav.cena ' . $_GET["sort_cena"] . ';';

    $stmt = $mysqli->prepare($query);

    if (isset($_GET["kvadratura"]) && isset($_GET["cena"])) {
        $stmt->bind_param("ii", isset($_GET["kvadratura"]), isset($_GET["cena"]));
    } else if (isset($_GET["kvadratura"])) {
        $stmt->bind_param("i", isset($_GET["kvadratura"]));
    } else if (isset($_GET["cena"])) {
        $stmt->bind_param("i", isset($_GET["cena"]));
    }

    $stmt->execute();

    return $stmt->get_result();
}

?>

<fieldset>
    <legend>Iskanje stanovanja</legend>
    <form action="iskanje.php" method="get">
        <label for="kvadratura">Min. Kvadratura</label>
        <input type="number" min="0" name="kvadratura">
        <label for="sort_kvadratura">Razvrsti</label>

        <input type="radio" name="sort_kvadratura" value="asc" required />
        <label for="asc">naraščajoče</label>

        <input type="radio" name="sort_kvadratura" value="desc" required />
        <label for="desc">padajoče</label>
        <br />

        <label for="cena">Min. Cena</label>
        <input type="number" min="0" name="cena">
        <label for="sort_cena">Razvrsti</label>
        <input type="radio" name="sort_cena" value="asc" required />
        <label for="asc">naraščajoče</label>
        <input type="radio" name="sort_cena" value="desc" required />
        <label for="desc">padajoče</label>
        <br />

        <input type="submit" value="poišči" />
    </form>
</fieldset>

<?php
$res = search();

if (!$res) {
    exit();
}
?>
<table>
    <thead>
        <tr>
            <th>Kraj</th>
            <th>Naslov</th>
            <th>StavbaID</th>
            <th>Zap. št.</th>
            <th>Kvadratura</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $res->fetch_assoc()) { ?>
            <tr>
                <td><?= $row["kraj"] ?></td>
                <td><?= $row["naslov"] ?></td>
                <td><?= $row["stavbaid"] ?></td>
                <td><?= $row["zapst"] ?></td>
                <td><?= $row["kvadratura"] ?></td>
                <td><?= $row["cena"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>