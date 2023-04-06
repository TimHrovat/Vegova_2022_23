<style>
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    table, tr {
        border-collapse: collapse;
    }
    td {
        width: 100px;
    }
    tr:nth-child(odd) {
        background-color: #d8e2f3;
    }
    tr:nth-child(even) {
        background-color: #abb9ca;
    }
</style>

<?php

require_once('funkcije.php');
require_once('podatki.php');

napolni($tab);
izpisi($tab);
echo "<br/>";

spremeni($tab);
izpisi($tab);
echo "<br/>";

$tab2 = prepisi($tab);
spremeni($tab2);

izpisi($tab);
echo "<br/>";
izpisi($tab2);