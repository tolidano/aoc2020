<?php
$i = file_get_contents("8.in");
$r = explode("\n", $i);
$acc = 0;
$ptr = 0;
$inf = false;
$seen = [];

while (!$inf) {
    if (!isset($seen[$ptr])) {
        $seen[$ptr] = true;
    } else {
        echo "ACC IS $acc\n";
        die();
    }
    $cmd = $r[$ptr];
    $p = explode(" ", $cmd);
    if ($p[0] == "nop") {
        echo "NOOP FROM $ptr\n";
        $ptr++;
    } elseif ($p[0] == "acc") {
        $acc += (int)$p[1];
        $ptr++;
    } elseif ($p[0] == "jmp") {
        $ptr += (int)$p[1];                
    }
}

echo $acc;
