<?php
$r = explode("\n", file_get_contents("13.in"));
$blank = array_pop($r);

$min = (int)$r[0];
$mins = explode(",", $r[1]);
$fins = [];
foreach ($mins as $m) {
    if ($m != "x") {
        $fins[] = (int)$m;
    }
}
echo "MIN: $min\n";
print_r($fins);
$min_d = 1000000000;
$x = 0;
foreach ($fins as $bus_num) {
    $rem = floor($min/$bus_num) * $bus_num + $bus_num;
    $diff = $rem - $min;
    echo "$min / $bus_num > $rem > $diff\n";
    if ($min_d > $rem) {
        $x = $bus_num * ($rem - $min);
        echo " X: $x\n";
    }
}
echo "DONE: $x\n";
