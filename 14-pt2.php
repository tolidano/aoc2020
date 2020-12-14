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
    $dec = $val;

    $bin = decbin($loc);
    while (strlen($bin) < 36) {
        $bin = '0' . $bin;
    }
    echo "BEFORE MASK: $bin ";
    $final = '';
    $locs = 1;
    for ($i = 0; $i < strlen($bin); $i++) {
        switch(substr($mask, $i, 1)) {
            case '0':
                $final .= substr($bin, $i, 1);
                break;
            case '1':
                $final .= '1';
                break;
            case 'X':
                $final .= 'X';
                $locs *= 2;
                break;
        }
    }
    echo "AFTER  MASK: $final LOCS: $locs\n";
    $finals = make_locs($final);
    print_r($finals);
    foreach ($finals as $final) {
        $mem[bindec($final)] = $dec;
    }
}
$sum = 0;
foreach ($mem as $loc => $val) {
    $sum += $val;
}
echo "SUM: $sum";

function make_locs($final) {
    $out = [];
    if (strlen($final) == 1) {
        if ($final == 'X') {
            return [0, 1];
        } else {
            return [$final];
        }
    }
    $rest = make_locs(substr($final, 1));
    if (substr($final, 0, 1) != 'X') {
        foreach ($rest as $r) {
            $out[] = substr($final, 0, 1) . $r;
        }
    } else {
        foreach ($rest as $r) {
            $out[] = '0' . $r;
        }
        foreach ($rest as $r) {
            $out[] = '1' . $r;
        }
    }
    return $out;
}
