<?php
$r = file_get_contents("6.in");
$c = count_chars($r, 1);
$d = 1;
$x[0] = 0;
foreach ($c as $k => $v) {
    if ($k > 48) $x[$k - 48] = $v;
}
while ($d <= 256) {
    $a = $x[0];
    $k = array_keys($x);
    $y = [];
    foreach ($k as $m) {
        if ($m) $y[$m - 1] = $x[$m];
    }
    $x = $y;
    $x[6] += $a;
    $x[8] += $a;
    $s = array_sum($x);
    $d++;
}
echo $s;
