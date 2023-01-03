<style>
    table, tr, td {
        border-collapse: collapse;
        border: 1px solid black;
    }

    .original tr {
        background-color: green;
        font-style: italic;
    }

    .sorted tr {
        background-color: red;
    }

    .sorted caption {
        font-style: bold;
    }
</style>

<?php

require_once("functions.php");

$arr = [];

fill($arr);
izpis($arr, "Originalna tabela", 0);

sortiraj($arr);

izpis($arr, "Padajoče razvrščeni podatki", 1);
