<?php

$i = file_get_contents("2.in");
$r = explode("\n", $i);
$v = 0;

foreach ($r as $l) {
    if (!trim($l)) {
        continue;
    }
    $p = explode(":", $l);
    $pw = trim($p[1]);
    $rq = explode(' ', $p[0]);
    $cntr = $rq[0];
    $chr = $rq[1];
    $cnts = explode('-', $cntr);
    $min = $cnts[0];
    $max = $cnts[1];
    $pwp = count_chars($pw, 1);
    if ($pwp[ord($chr)] >= $min && $pwp[ord($chr)] <= $max) {
        $v++;
    }
}

echo $v;
