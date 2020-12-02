<?php

$i = file_get_contents("2.in");
$r = explode("\n", $i);
$v = 0;

foreach ($r as $l) {
    $f = 0;
    if (!trim($l)) {
        continue;
    }
    $p = explode(":", $l);
    $pw = trim($p[1]);
    $rq = explode(' ', $p[0]);
    $cntr = $rq[0];
    $chr = $rq[1];
    $cnts = explode('-', $cntr);
    $pos1 = $cnts[0];
    $pos2 = $cnts[1];
    if (substr($pw, $pos1 - 1, 1) == $chr) {
        $f = 1;
    }
    if (substr($pw, $pos2 - 1, 1) == $chr) {
        if ($f == 1) {
            continue;
        }
        $v++;
    }
    if ($f == 1) {
        $v++;
    }
}

echo $v . "\n";
