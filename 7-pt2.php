<?php
$i = file_get_contents("7.in");
$r = explode("\n", $i);
$rules1 = [];
$rules2 = [];
$sbs = [];
$bags = 0;

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

echo bag_count($rules2, "shiny gold");

function bag_count($rules2, $color) {
    echo "CHECKING COLOR $color\n";
    print_r($rules2[$color]);
    if (!$rules2[$color]["list"]) {
        echo "NO BAGS IN FOR $color\n";
        return 0;
    } else {
        $sum = 0;
        foreach ($rules2[$color]["list"] as $parts) {
            $sump = (int)$parts["#"] + ((int)$parts["#"] * bag_count($rules2, $parts["T"] . " " . $parts["C"]));
            $parts["X"] = $sump;
            print_r($parts);
            $sum += $sump;
        }
        echo "SUM IS $sum\n";
        return $sum;
    }
}
