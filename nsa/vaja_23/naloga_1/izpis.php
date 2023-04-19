<?php

require_once("utils.php");

check_login();

function izpis()
{

    $mysqli = connect();

    $zaupno_where = "";

    if (isset($_POST["zaupno"])) {
        $zaupno_where = "OR zaupno = ?";
    }

    $query = "SELECT stavbaid, zap_st, povrsina_kvadrati, prijavljenih, vrednoststanovanja
              FROM stavba
              WHERE zaupno IS NULL $zaupno_where
              ORDER BY zap_st ASC";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", password_hash($_POST["zaupno"], PASSWORD_DEFAULT));

    $stmt->execute();

    return $stmt->get_result();
}

?>

<form action="izpis.php" method="post">
    <input type="text" name="zaupno" placeholder="zaupno" />
    <input type="submit" value="izpis" />
</form>

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
        <?php
        $res = izpis();

        if (!$res) {
            exit();
        }

        while ($row = $res->fetch_assoc()) { ?>
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