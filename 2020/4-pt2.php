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

$validx = [
    'byr' => [1920, 2002],
    'iyr' => [2010, 2020],
    'eyr' => [2020, 2030],
    'hgt' => ['cm' => [150, 193], 'in' => [59, 76]],
    'hcl' => '#{6}[0-9a-f]',
    'ecl' => ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'],
    'pid' => '{9}[0-9]',
];

foreach ($r as $l) {
    if (!trim($l)) { // blank lines
        $valid = true;
        foreach ($pp as $k => $x) {
            if ($k == 'cid') {
                continue;
            }
            if ($k == 'byr' && ($x < 1920 || $x > 2002)) {
                $valid = false;
                break;
            }
            if ($k == 'iyr' && ($x < 2010 || $x > 2020)) {
                $valid = false;
                break;
            }
            if ($k == 'eyr' && ($x < 2020 || $x > 2030)) {
                $valid = false;
                break;
            }
            if ($k == 'hgt') {
                $meas = substr($x, -2);
                $left = substr($x, 0, -2);
                if (!is_numeric($left)) {
                    $valid = false;
                    break;
                }
                if ($meas == 'cm' && ($left < 150 || $left > 193)) {
                    $valid = false;
                    break;
                }
                if ($meas == 'in' && ($left < 59 || $left > 76)) {
                    $valid = false;
                    break;
                }
            }
            if ($k == 'ecl' && !in_array($x, $validx['ecl'])) {
                $valid = false;
                break;
            }
            if ($k == 'hcl') {
                if (substr($x, 0, 1) != '#' || !hex2bin(substr($x, 1))) {
                    $valid = false;
                    break;
                }
            }
            if ($k == 'pid') {
                if (strlen($x) != 9 || !is_numeric($x)) {
                    $valid = false;
                    break;
                }
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
