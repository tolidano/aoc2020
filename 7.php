<?php

$i = file_get_contents("7.in");
$r = explode("\n", $i);
$c = 0;

foreach ($r as $l) {
    if (!trim($l)) { // blank lines
        continue;
    }

    $p = explode(":", $l); // split on :
    $pw = trim($p[1]); // trim the space and have just the pw (after the colon)
    $rq = explode(' ', $p[0]); // the part before the colon was x-y c
    $pwp = count_chars($pw, 1); // magic in php to get character counts by ascii code
    if ($pwp[ord($chr)] >= $min && $pwp[ord($chr)] <= $max) { // just check if the character appears in range
        $c++;
    }
}

echo $c;
