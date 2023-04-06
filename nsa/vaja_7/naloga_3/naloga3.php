
<style>
    table,td,tr,th {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<?php
    require_once("funkcije.php");

    $tab = [];

    binaryFill($tab);

    izpis($tab, prvaPretvorba($tab));
    izpis($tab, drugaPretvorba($tab));
?>