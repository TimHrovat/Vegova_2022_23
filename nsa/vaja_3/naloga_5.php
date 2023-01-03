<?php 
    $capital = chr(rand("65", "90"));
    $letters = "";
    $style = "diff";
    for ($i = 0; $i < 3; $i++) {
        $letters .= chr(rand("97", "122"));
        if ($capital == strtoupper($letters[$i])) {
            $style = "same";
        }
    }

    echo '<h1 class="'.$style.'">'.$capital.'</h1><p class="'.$style.'">'.$letters.'</p>';

    echo '
        <style>
            .same {
                display: inline;
                color: red; font-size 12px;
            }
            h1.diff {
                display: inline;
                color: blue; font-size 16px;
            }
            p.diff {
                display: inline;
                color: green; font-size: 20px;
            }
        </style>
    ';
?>