<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    table, tr, td {
        border-collapse: collapse;
    }

    .siva_tabela tr td {
        color: white;
        background-color: silver;
        border: 1px solid grey;
        padding: 4px 12px;
        text-align: center;
    }

    .modra_tabela tr td  {
        color: blue;
        background-color: lightblue;
        border: 2px dashed darkblue;
        padding: 4px 12px;
        text-align: center;
    }

    thead {
        color: grey;
    }

    hr {
        width: 80vw;
        height: 2px;
        color: red;
        margin: 30px 0;
    }

    table, hr {
        position: relative;
        left: 50%;
        transform: translateX(-50%);
    }

    div {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
    }
</style>

<?php

require_once('funkcije.php');

$t1;
funct_1($t1);
$t2;
funct_2($t2, $t1);

echo "<div>";
    funct_3($t1,$t2, "siva_tabela", "Prvi izpis");
    echo "<hr/>";
    funct_3($t1,$t2, "modra_tabela", "Drugi izpis");
echo "</div>";
?>