<?php
    $starost = rand(0, 20);
    $rezultat = rand(0,20);

    echo "starost: $starost <br/>";
    echo "rezultat: $rezultat <br/>";

    if ($rezultat > 10 && $starost < 10) {
        echo '<p style="color:green">Odlično</p>';
        return;
    }
    if ($rezultat > 10 && $starost > 10) {
        echo '<p style="color:blue">Povprečno</p>';
        return;
    }
    if ($rezultat < 10 && $starost < 10) {
        echo '<p style="color:blue">Podpovprečno</p>';
        return;
    }
    if ($rezultat < 10 && $starost > 10) {
        echo '<p style="color:red">Katastrofalno</p>';
        return;
    }
?>