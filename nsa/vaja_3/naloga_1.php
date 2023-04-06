<?php
    $r = rand(-10, 100);

    echo "r: " . $r . "<br/>";

    if ($r < 0) 
        echo "Takega kroga ni";
    else if ($r == 0) 
        echo "To je točka";
    else {
        echo "Obseg: " . round($r * 2 * pi(),6) . "<br/>";
        echo "Ploščina: " . round(sqrt($r) * pi(),6);
    }
    
?>