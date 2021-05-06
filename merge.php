<?php

$shape_pool = array();

$get_shape = function($gd, $p) {
    $set = '';
    for ($y = 0; $y < 24; $y ++) {
        for ($x = 0; $x < 16; $x ++) {
            $rgb = imagecolorat($gd, $x + 16 * $p + 3, $y);
            $colors = imagecolorsforindex($gd, $rgb);
            $gray = ($colors['red'] + $colors['green'] + $colors['blue']) / 3;
            if ($colors['alpha'] == 127 or $gray < 127) {
                $set .= 1;
            } else {
                $set .= 0;
            }
        }
    }
    return $set;
};

$find_shape = function($shape) use (&$shape_pool) {
    foreach ($shape_pool as $idx => $check_shape) {
        $wrong = 0;
        for ($i = 0; $i < 16 * 24; $i ++) {
            if ($check_shape[$i] != $shape[$i]) {
                $wrong ++;
            }
            if ($wrong > 40) {
                continue 2;
            }
        }

        error_log("hit");
        return;
    }
    error_log("add new shape: " . count($shape_pool));
    $shape_pool[] = $shape;
};

for ($i = 0; $i < 500; $i ++) {
    $gd = imagecreatefrompng("input/{$i}.png");
    for ($p = 0; $p < 4; $p ++) {
        $shape = $get_shape($gd, $p);
        $find_shape($shape);
    }
}
echo json_encode($shape_pool);
