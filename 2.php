<?php

$i = file_get_contents("2.in");
$r = explode("\n", $i);
$v = 0;

foreach ($r as $l) {
    if (!trim($l)) { // blank lines
        continue;
    }
    // ex: 1-3 a: abcde
    $p = explode(":", $l); // split on :
    $pw = trim($p[1]); // trim the space and have just the pw (after the colon)
    $rq = explode(' ', $p[0]); // the part before the colon was x-y c
    $cntr = $rq[0]; // x-y
    $chr = $rq[1]; // c
    $cnts = explode('-', $cntr); // [x, y]
    $min = $cnts[0]; // x
    $max = $cnts[1]; // y
    $pwp = count_chars($pw, 1); // magic in php to get character counts by ascii code
    if ($pwp[ord($chr)] >= $min && $pwp[ord($chr)] <= $max) { // just check if the character appears in range
        $v++;
    }
}

echo $v;
