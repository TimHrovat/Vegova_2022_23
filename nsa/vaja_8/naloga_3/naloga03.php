<?php

require_once("funkcijeBeseda.php");

$beseda = "";
$soglasniki = "";
$samoglasniki = "";

fill($beseda);
fillByType($beseda, $soglasniki, $samoglasniki);

izpis("Beseda", $beseda);
izpis("Samoglasniki", $samoglasniki);
izpis("Soglasniki", $soglasniki);
izpis("Prvi soglasnik", findFirst($soglasniki));