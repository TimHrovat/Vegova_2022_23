<?php 

require_once("funkcije.php");

$t1 = array();

napolni($t1);

echo "<pre>",print_r($t1),"</pre>";

razvrstiNarascajoce($t1);

$count = izpis($t1);

echo '<p>Najmanjša črka ',$count["prva"][0],' se v besedi ponovi ',$count["prva"][1],'-krat</p>';
echo '<p>Največja črka ',$count["zadnja"][0],' se v besedi ponovi ',$count["zadnja"][1],'-krat</p>';

$ponovitve = ponovitveABC($t1);

izpisPonovitve($ponovitve);