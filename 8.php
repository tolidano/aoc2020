<?php
$i = file_get_contents("7.in");
$r = explode("\n", $i);
$ans = 0;

foreach ($r as $l) {
    if (!trim($l)) {
        continue;
    }
    echo $l . "\n";
}

echo $ans;
