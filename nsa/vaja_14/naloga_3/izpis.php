<style>
    p {
        display: inline-block;
    }
</style>

<?php


$str = $_GET["str"];

$arr = str_split($str);


function getColorOutput($arr) {

    $colors = ["red", "green", "blue"];
    $color_iterator = 0;
    foreach ($arr as $letter) {
        if ($letter !== " ") {
            echo '<p style="color:'.$colors[$color_iterator].';">'.$letter.'</p>';

            $color_iterator = $color_iterator === 2 ? 0 : $color_iterator +1;

            continue;
        } 

        echo '<p>&#160;</p>';
    }

}

function getGrayscaleOutput($str) {
    echo $str;
}

if (isset($_GET["grayscale"])) {
    getGrayscaleOutput($str);
} else {
    getColorOutput($arr);
}