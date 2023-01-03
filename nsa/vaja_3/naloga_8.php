<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td { 
            border: 2px solid darkblue;
            padding: 5px;
        }
        .sodo {
            font-size: 16pt;
            color: green;
            font-weight: bold;
        }
        .liho {
            font-style: italic;
            font-weight: bold;
            font-size: 12pt;
            color: blue;
        }
    </style>
</head>
<body>
    <?php
        $i = 0; $j = 0;
        echo '<table>';
        do {
            echo '<tr>';
            do {
                $st = rand(10,800);
                $style = $st % 2 == 0 ? "sodo" : "liho";
                echo '<td class="'.$style.'">'.$st.'</td>';
                $j++;
            } while ($j < 12);
            echo '</tr>';
            $j = 0;
            $i++; 
        } while ($i < 10);
        echo '</table>';
    ?>
</body>
</html>

