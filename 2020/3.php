<?php

function check($down, $right) {
    $i = file_get_contents("3.in");
    $r = explode("\n", $i);
    $t = 0;
    $c = count($r);
    $rw = 0;
    $width = strlen(trim($r[0]));
    $pos = 0;

    while ($rw < $c) {
        $rw += $down;
        $pos += $right;
        if ($pos >= $width) {
            $pos -= $width;
        }
        if (substr($r[$rw], $pos, 1) == '#') {
            $t++;
        }
    }
    return $t;
}

$a = check(1, 1);
$t = check(1, 3);
$c = check(1, 5);
$d = check(1, 7);
$m = check(2, 1);
echo $a * $t * $c * $d * $m;
