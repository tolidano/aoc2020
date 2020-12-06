<?php

$i = file_get_contents("6.in");
$r = explode("\n", $i);
$c = 0;
$g = [];
$p = 0;

foreach ($r as $l) {
    if (!trim($l)) {
        $y = 0;
        foreach ($g as $e => $d) {
            if ($d == $p) {
                $y++;
            }
        }
        $c += $y;

        $g = [];
        $p = 0;
        continue;
    }

    $p++;
    for ($i = 0; $i < strlen($l); $i++) {
        if (!isset($g[substr($l, $i, 1)])) {
            $g[substr($l, $i, 1)] = 0;
        }
        $g[substr($l, $i, 1)]++;
    }
}

echo $c;
