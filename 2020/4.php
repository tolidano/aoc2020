<?php

$i = file_get_contents("4.in");
$r = explode("\n", $i);
$v = 0;
$pp = ['byr' => 0,
    'iyr' => 0,
    'eyr' => 0,
    'hgt' => 0,
    'hcl' => '',
    'ecl' => '',
    'pid' => '',
    'cid' => '',];

foreach ($r as $l) {
    if (!trim($l)) { // blank lines
        $valid = true;
        foreach ($pp as $k => $x) {
            if (!$x && $k != 'cid') {
                $valid = false;
            }
        }
        if ($valid) {
            $v++;
        }
        $pp = ['byr' => 0,
            'iyr' => 0,
            'eyr' => 0,
            'hgt' => 0,
            'hcl' => '',
            'ecl' => '',
            'pid' => '',
            'cid' => '',];
        continue;
    }

    $f = explode(' ', $l);
    foreach ($f as $part) {
        $pts = explode(':', $part);
        if ($pts[0]) {
            $pp[$pts[0]] = $pts[1];    
        }
    }
}

echo $v;
