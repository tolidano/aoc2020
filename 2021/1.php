<?php
$r = file_get_contents("1.in");
$l = explode("\n", $r);
$inc = 0;
$prev = 0;
foreach ($l as $i => $v) {
    if (($v > $prev) && $i) {
        $inc++;
    }
    $prev = $v;
}
echo $inc;
