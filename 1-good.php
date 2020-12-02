<?php

$d = file_get_contents("1.in");
$r = explode("\n", $d);
$m = [];
foreach ($r as $a) {
    $m[(int)$a] = 1;
}
foreach ($r as $b) {
    $need = 2020 - (int)$b;
    if (isset($m[$need])) {
        echo $need * $b . "\n";
        break;
    }
}

// Now for part 2:

$m = [];
foreach ($r as $a) {
    foreach ($r as $b) {
        $m[(int)$b + (int)$a] = [(int)$a, (int)$b];
    }
}

foreach ($r as $c) {
    $need = 2020 - (int)$c;
    if (isset($m[$need])) {
        $pos = $m[$need][0] * $m[$need][1] * $c;
        if ($pos) {
            echo $pos . "\n";
            break;
        }
    }
}
