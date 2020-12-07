<?php
$i = file_get_contents("7.in");
$r = explode("\n", $i);
$rules1 = [];
$rules2 = [];
$sbs = [];
$hassg = 0;

foreach ($r as $l) {
    if (!trim($l)) {
        continue;
    }
    $out = substr($l, 0, strpos($l, ' bags'));
    $ina = substr($l, strpos($l, ' contain ') + 9);
    $in = explode(",", $ina);
    $rules[$out] = [];
    foreach ($in as $oin) {
        $oins = explode(" ", trim($oin));
        $rules2[$out]["list"][] = ["#" => $oins[0], "T" => $oins[1], "C" => $oins[2],];
        $rules1[$out]["list"][] = $oins[1] . ' ' . $oins[2];
    }
}

$nextpass[] = "shiny gold";
while (count($nextpass)) {
    $next = array_pop($nextpass);
    foreach ($rules1 as $c => $con) {
        if (in_array($next, $con["list"])) {
            if (!isset($rules1[$c]["sg"])) {
                $nextpass[] = $c;
                $rules1[$c]["sg"] = true;
            }
        }
    }
}

foreach ($rules1 as $c => $val) {
    if (isset($val["sg"])) {
        $hassg++;
    }
}

echo $hassg;
