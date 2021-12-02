<?php
$i = file_get_contents("10.in");
$r = explode("\n", $i);

sort($r);
$start = 0;
$threediff = 1;
$onediff = 0;
foreach ($r as $l) {
    if (!trim($l)) {
        continue;
    }
    if ((int)$l == $start + 1) {
        $onediff++;
    } elseif ((int)$l == $start + 3) {
        $threediff++;
    } else {
    }
    $start = (int)$l;
}

echo $onediff * $threediff;
