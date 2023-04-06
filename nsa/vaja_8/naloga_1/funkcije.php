<?php
function makeColorsTheKey($colors) {
    $tab = array();
    for ($i = 0; $i < count($colors); $i++) {
        $tab[$colors[$i]][] = 1;
    }
    return $tab;
}

function makeColorsTheKeyAndValuesIndex($colors) {
    $tab = array();
    for ($i = 0; $i < count($colors); $i++) {
        $tab[$colors[$i]][] = $i;
    }
    return $tab;
}

function count_vals($colors) {
    return array_count_values($colors);
}

function printVertical($colors) {
    echo "<table>";
    $colspan = 1;
    foreach ($colors as $key => $val) {
        if (is_array($val) && count($val) > $colspan) {
            $colspan = count($val);
        } 
    }

    foreach ($colors as $key => $val) {
        echo '<tr><th colspan="'.$colspan.'">',$key,'</th></th>';
        echo "<tr>";
        
        if (is_array($val))
        {for ($i = 0; $i < count($val); $i++) {
            echo "<td>$val[$i]</td>";
        }
        } else {
            echo "<td>$val</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

function printHorizontal($colors) {
    echo "<table>";
    foreach ($colors as $key => $val) {
        echo '<tr><td class="horizont"><b>',$key,'</b></td></th>';

        
        if (is_array($val))
        {for ($i = 0; $i < count($val); $i++) {
            echo "<td>$val[$i]</td>";
        }
        } else {
            echo "<td>$val</td>";
        }

    }

    echo "</table>";
}
?>

