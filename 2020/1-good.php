<?php
$r = explode("\n", file_get_contents("1.in");
$m = [];

/* 
 * O(n)
 */
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

/*
 * O(n^2)
 */
foreach ($r as $a) {
    foreach ($r as $b) {
        if ($a + $b == 2020) {
            echo $a * $b . "\n";
            break;
        }
    }
}

/*
 * O(n^2)
 */
$m = [];
foreach ($r as $a) {
    foreach ($r as $b) {
        $m[(int)$b + (int)$a] = [(int)$a, (int)$b];
    }
}
foreach ($r as $c) {
    $need = 2020 - (int)$c;
    if (isset($m[$need])) {
        if ($pos = $m[$need][0] * $m[$need][1] * $c) {
            echo $pos . "\n";
            break;
        }
    }
}
