<style>
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 4px 8px;
        text-align: center;
    }
    table, td {
        border-collapse: collapse;
    }
</style>


<?php

require_once("tocke.php");
require_once("funkcijeBarve.php");

addPoints($tocke);
output($tocke);