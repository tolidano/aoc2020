<?php
$r = file_get_contents("1.in");
$l = explode("\n", $r);
$inc = 0;
$prev = 0;
for ($i = 0; $i < count($l) - 4; $i++) {
    $v = $l[$i] + $l[$i + 1] + $l[$i + 2];
    if (($v > $prev) && $i) {
        $inc++;
    }
    $prev = $v;
}
echo $inc;
