<style>
    tr,
    td {
        width: 50px;
        height: 50px;
    }
</style>

<?php
echo '<table>';
for ($i = 0; $i < $_GET['vrstice']; $i++) {
    echo '<tr>';
    for ($j = 0; $j < $_GET['stolpci']; $j++) {
        if ($i == $j) {
            echo '<td style="background-color:' . $_GET['diagonala'] . ';"> </td>';
        } else {
            echo '<td style="background-color:' . $_GET['ostalo'] . ';"> </td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
?>