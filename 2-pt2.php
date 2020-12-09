<?php
$r = explode("\n", file_get_contents("2.in"));
$v = 0;

foreach ($r as $l) {
    if (!trim($l)) {
        continue;
    }
    $f = 0;
    $p = explode(":", $l);
    $pw = trim($p[1]);
    $rq = explode(' ', $p[0]);
    $cntr = $rq[0];
    $chr = $rq[1];
    $cnts = explode('-', $cntr);
    $pos1 = $cnts[0]; // now a position
    $pos2 = $cnts[1]; // also a position
    if (substr($pw, $pos1 - 1, 1) == $chr) {
        $f = 1; // set some flag if the first position has the char
    }
    if (substr($pw, $pos2 - 1, 1) == $chr) {
        if ($f == 1) {
            continue; // both positions have the flag, continue
        }
        $v++;
    }
    if ($f == 1) { // the 2nd position was not the chr, so it is good
        $v++;
    }
}

echo $v;
