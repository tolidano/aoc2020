<?php

$i = file_get_contents("5.in");
$r = explode("\n", $i);
$m = 0;
$sids = [];

foreach ($r as $l) {
    if (!trim($l)) {
        continue;
    }
    $minrow = 0;
    $maxrow = 127;
    $minseat = 0;
    $maxseat = 7;
    for ($j = 0; $j < 7; $j++) {
        if (substr($l, $j, 1) == 'F') {
            $maxrow = $minrow + (int)(($maxrow - $minrow) / 2);
        } else {
            $minrow = $minrow + (int)(($maxrow - $minrow) / 2) + 1; 
        }
    }
    for ($k = 7; $k < 10; $k++) {
        if (substr($l, $k, 1) == 'L') {
            $maxseat = $minseat + (int)(($maxseat - $minseat) / 2);
        } else {
            $minseat = $minseat + (int)(($maxseat - $minseat) / 2); 
        }
    }
    $seatId = ($maxrow * 8) + $maxseat;
    $sids[$seatId] = 1;
    if ($m < $seatId) {
        $m = $seatId;
    }
}

echo $m . "\n";

$check = false;
for ($n = 0; $n < $m; $n++) {
    if (isset($sids[$n])) {
        $check = true;
    }
    if ($check && !isset($sids[$n]) && isset($sids[$n - 1]) && isset($sids[$n + 1])) {
        echo $n . "\n";
    }
}
