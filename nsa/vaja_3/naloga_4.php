<?php
    $st = rand(1,7);

    for ($i = 0; $i < 5; $i++) {
        $font_size = 10 + 2 * $i;
        $t = $st + $st * $i;

        echo '<p style="font-size:'.$font_size.'px">'.$t;
        if ($i +1 < 5) {
            echo '<';
        }
        echo '<p/>';
    }

    echo '
        <style>
            p {
                display: inline;
            } 
        </style>
    ';
?>