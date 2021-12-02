<?php
ini_set('memory_limit', -1);
$i = file_get_contents("10.in");
$r = explode("\n", $i);

sort($r);
array_shift($r);
$start = 0;
$pop = 0;

for ($i = count($r) - 2; $i >= 1; $i--) {
    $diff = (int)$r[$i + 1] - (int)$r[$i - 1];
    echo "AT INDEX: $i LOOKING AT {$r[$i]} WHICH HAS {$r[$i - 1]} AND {$r[$i + 1]} SURROUNDING WITH DIFF $diff - ";
    if ($diff <= 3) {
        $pop++;
        echo "INCREMENTED $pop";
    }
    echo "\n";
}
echo pow(2, $pop + 2) . "\n";
echo pow(2, $pop + 1) . "\n";
echo pow(2, $pop) . "\n";
echo pow(2, $pop - 1) . "\n";
echo pow(2, $pop - 2) . "\n";
echo pow(2, $pop - 3) . "\n";
