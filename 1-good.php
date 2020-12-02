<?php

$d = file_get_contents("1.in");
$r = explode("\n", $d);
$m = [];

/* Now the better way...
 * This is the 2-sum 3-sum problem you can google about it
 * The trick is to make a hash table on the first pass
 * Then the second pass gets you the answer because checking for the first number is now O(1)
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

/* Now for part 2:
 * We have to do an all pairs loop now, to store the sum of two in the hash table
 * But then we keep the same code, effectively
 * An array holds the two distinct values so we can multiply properly
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
        $pos = $m[$need][0] * $m[$need][1] * $c;
        if ($pos) {
            echo $pos . "\n";
            break;
        }
    }
}
