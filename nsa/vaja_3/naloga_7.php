<?php
    $obdobje = rand(1,36);
    $znesek = rand(1, 1000000);     

    $obrestna_mera = 4.5;
  
    if ($obdobje > 12)
        $obrestna_mera = 4.25;
    else if ($obdobje > 6)
        $obrestna_mera = 4;
    else if ($obdobje > 3)
        $obrestna_mera = 3.6;
    else if ($obdobje > 1)
        $obrestna_mera = 3;
    else if ($obdobje == 1)
        $obrestna_mera = 2.3;

    if ($znesek > 200000)
        $obrestna_mera += 0.5;
    else if ($znesek > 100000)
        $obrestna_mera += 0.4;
    else if ($znesek > 50000)
        $obrestna_mera += 0.35;
    else if ($znesek > 25000)
        $obrestna_mera += 0.25;

    echo '
        <p>Znesek vezave: <b>'.number_format($znesek, 2, ",", ".").'&euro;</b></p>
        <p>Obdobje vezave: <b>'.$obdobje.'</b></p>
        <p>Končni znesek: <b><u>'.number_format(($znesek * (1+$obrestna_mera/100)), "2", ",", ".").'&euro;</u></b></p>
    '

?>