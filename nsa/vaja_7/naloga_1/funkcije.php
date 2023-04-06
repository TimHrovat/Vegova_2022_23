
<?php

    function napolni (&$arr) {
        $row_col = rand(2,8);
        for ($i = 0; $i < $row_col; $i++) {
            for ($j = 0; $j < $row_col; $j++) {
                if ($i === $j) 
                    $arr[$i][$j] = '*';
                else if ($j < $i)
                    $arr[$i][$j] = $row_col;
                else 
                    $arr[$i][$j] = 0;
            }
        }
    }

    function izpisi1($arr) {
        echo "<table>";
        echo '<thead><tr><th colspan="',count($arr),'">Tabela velikosti ',count($arr),'x',count($arr),'</th></tr></thead>';
        for ($i = 0; $i < count($arr); $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($arr); $j++) {
                echo "<td>",$arr[$i][$j],"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } 

    function getRandColor() {
        $color = dechex(rand(1,pow(2,24)-1));
        return $color;
    }

    function izpisi2($arr) {

        $colors = [];
        for ($i = 0; $i < 3; $i++) {
            $colors[$i] = getRandColor();
        }

        echo "<table>";
        echo '<thead><tr><th colspan="',count($arr),'">Tabela velikosti ',count($arr),'x',count($arr),'</th></tr></thead>';
        for ($i = 0; $i < count($arr); $i++) {
            echo "<tr>";
            $color = 0;
            for ($j = 0; $j < count($arr); $j++) {
                if ($i === $j) 
                    $color = $colors[0];
                else if ($j < $i)
                    $color = $colors[1];
                else 
                    $color = $colors[2];
                echo '<td style="background-color:#',$color,'">',$arr[$i][$j],"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } 
?>