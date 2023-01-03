<style>
    b {
        font-style: bold;
    }
</style>

<?php
    require_once("funkcije.php");
    require_once("podatki.php");

    funkcijaA($vrtec);
    echo "<pre>";
    print_r($vrtec);
    echo "</pre>";

    funkcijaB($vrtec);

    funkcijaC($vrtec, "medvedek");
    funkcijaD($vrtec, "medvedek");
?>