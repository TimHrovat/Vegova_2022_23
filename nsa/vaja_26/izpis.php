<?php

require_once("utils.php");

check_access();

$mysqli = connect();

$schools_q = "SELECT SID, imeSole FROM Sola";

$schools = $mysqli->query($schools_q);

if ($mysqli->error) {
    exit("prišlo je do napake");
}

?>

<form action="" method="get">
    <select name="school">
        <?php while ($school = $schools->fetch_assoc()) { ?>
            <option value="<?= $school["SID"] ?>"><?= $school["imeSole"] ?></option>
        <?php } ?>
    </select><br/>
    <input type="submit" value="išči" />
</form> <br />

<?php
if (!isset($_GET["school"])) {
    exit();
}

$page = isset($_GET["page"]) ? $_GET["page"] : 0;

$items_per_page = 5;

$dijaki_count_q = "SELECT COUNT(*) FROM Dijak WHERE SID = " . $mysqli->real_escape_string($_GET["school"]);

$dijaki_count = $mysqli->query($dijaki_count_q)->fetch_array()[0];

$max_page = floor($dijaki_count / $items_per_page);

if ($page > $max_page) {
    exit("stran ne obstaja");
}

$dijaki_q = "SELECT ime, priimek FROM Dijak WHERE SID = ? ORDER BY priimek ASC, ime ASC LIMIT ?, ?";

$dijaki_stmt = $mysqli->prepare($dijaki_q);

$dijaki_stmt->bind_param('iii', $_GET["school"], $page * $items_per_page, $items_per_page);

$dijaki_stmt->execute();

if ($dijaki_stmt->error) {
    exit("prišlo je do napake");
}

$dijaki = $dijaki_stmt->get_result();
?>

<table>
    <thead>
        <tr>
            <th>IME</th>
            <th>Priimek</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($dijak = $dijaki->fetch_assoc()) { ?>
            <tr>
                <td><?= $dijak["ime"] ?></td>
                <td><?= $dijak["priimek"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table><br />

<div>
    <span>pages:</span>
    <?php for ($i = 0; $i < $max_page; $i++) { ?>
        <a href="?school=<?= $_GET["school"] ?>&page=<?= $i ?>"><?= $i + 1 ?></a>
    <?php } ?>
</div>