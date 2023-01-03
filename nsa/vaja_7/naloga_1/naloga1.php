<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    td {
        width: 30px;
        height: 30px;
    }
    table, tr, td {
        border-collapse: collapse;
    }
    td {
        border: 1px solid black;
        text-align: center;
    }
    th {
        width: 100%;
        text-align: center;
    }
</style>

<?php
    require_once('funkcije.php');
    
    $tab;
    napolni($tab);

    izpisi1($tab);
    izpisi2($tab);
?>