<?php

    $leto = rand(1500,2100);

    $deljiva_4 = $leto % 4 == 0 ? true : false;
    $deljiva_100 = $leto % 100 == 0 ? true : false;
    $deljiva_400 = $leto % 400 == 0 ? true : false;

    $prestopno = $deljiva_4 && (($deljiva_100 && $deljiva_400) || (!$deljiva_100 && !$deljiva_400)) ? true : false;

    switch ($prestopno) {
        case true:
            echo '<p style="color:blue">leto ' . $leto . ' je prestopno</p>';
            break;
        default:
            echo '<p style="color:red">leto ' . $leto . ' ni prestopno</p>';
            break;
    }
?>