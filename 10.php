<?php
$i = file_get_contents("10.in");
$r = explode("\n", $i);

for ($i = 25; $i < count($r); $i++) {
    $target = $r[$i];
    $found = false;
    for ($j = $i - 25; $j < $i; $j++) {
        for ($k = $i - 25; $k < $i; $k++) {
            if ($k != $j) {
                $sum = $r[$j] + $r[$k];
                if ($sum == $target) {
                    $found = true;
                }
            }
        }
    }
    if (!$found) {
        echo $target;
        die;
    }
}
