<?php
    $x="00111011";

    $dec = bindec($x);
    $oct = decoct($dec);
    $hex = dechex($dec);


    echo 'dec: ',$dec, "<br/>";
    echo 'oct: ',$oct, "<br/>";
    echo 'hex: ',$hex, "<br/>";
?>