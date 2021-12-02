<?php

$i = file_get_contents("6.in");
$r = explode("\n", $i);
$c = 0;
$g = [];

foreach ($r as $l) {
    if (!trim($l)) {
        $k = array_keys($g);
        $c += count($k);

        $g = [];
        continue;
    }

    for ($i = 0; $i < strlen($l); $i++) {
        $g[substr($l, $i, 1)] = true;
    }
}

echo $c;
