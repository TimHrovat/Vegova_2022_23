<style>
    table,tr {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .horizont {
        border: 1px solid black;
    }
</style>

<?php
require_once('podatki.php');
require_once('funkcije.php');

$tab2 = makeColorsTheKey($tab);
$tab3 = makeColorsTheKeyAndValuesIndex($tab);
$tab_4 = count_vals($tab);


echo printVertical($tab3);
echo printHorizontal($tab3);

?>