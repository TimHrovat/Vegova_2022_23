<?php
    $a = rand(1, 500);
    $b = rand(1, 500);

    $obseg = 2*$a + 2*$b;
    $ploscina = $a * $b;
    $diagonala = sqrt(pow($a, 2) + pow($b, 2));

    $font_size = "36pt";

    switch ($ploscina < 10000)
        {case true: $font_size = "12pt";}
    switch ($ploscina > 10000 && $ploscina <= 90000)
        {case true: $font_size = "24pt";}

    echo '<p style="font-size: ' . $font_size . '">'.number_format($ploscina, 2, ",", ".").'</p>';

?>
