<?php
$r = file_get_contents("6.in");
$c = count_chars($r, 1);
foreach ($c as $k => $v) {
    if ($k > 48) $x[$k - 48] = $v;
}
for ($d = 0; $d < 256; $d++) {
    $a = $x[0];
    foreach (array_keys($x) as $m) {
        if ($m) $y[$m - 1] = $x[$m];
    }
    $x = $y;
    unset($y);
    $x[6] += $a;
    $x[8] += $a;
}
echo array_sum($x);
