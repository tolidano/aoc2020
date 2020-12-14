<?php
$r = explode("\n", file_get_contents("14.in"));
$blank = array_pop($r);

$mask = '';
$mem = [];

foreach ($r as $l) {
    echo "LINE: $l ";
    if (substr($l, 0, 4) == "mask") {
        $mask = substr($l, 7);
        echo "SET MASK $mask ";
        continue;
    } else {
        $p = explode("=", $l);
        $val = trim($p[1]);
        $q = explode("[", $p[0]);
        $loc = substr($q[1], 0, -2);
        echo "LOC: $loc VAL: $val ";
    }
    $bin = decbin($val);
    while (strlen($bin) < 36) {
        $bin = '0' . $bin;
    }
    echo "BEFORE MASK: $bin ";
    for ($i = 0; $i < strlen($bin); $i++) {
        if (substr($mask, $i, 1) != 'X') {
            if ($i == 0) {
                $bin = substr($mask, $i, 1) . substr($bin, 1);
            } elseif ($i == strlen($bin) - 1) {
                $bin = substr($bin, 0, -1) . substr($mask, $i, 1);
            } else {
                $bin = substr($bin, 0, $i) . substr($mask, $i, 1) . substr($bin, $i + 1);
            }
        }
    }
    echo "AFTER  MASK: $bin ";
    $dec = bindec($bin);
    echo "DEC: $dec\n";
    $mem[(int)$loc] = $dec;
}
$sum = 0;
foreach ($mem as $loc => $val) {
    $sum += $val;
}
echo "SUM: $sum";
