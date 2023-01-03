<?php
    $st = 3;
    for ($i = 0; $i < 10; $i++) { 
        $font_size = 10 + $i*2;
        echo "<p style='font-size:$font_size'>$st,</p>";
        $st += $st + 1;
    }
?>