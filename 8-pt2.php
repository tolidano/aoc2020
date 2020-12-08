<?php
$i = file_get_contents("8.in");
$r = explode("\n", $i);

$top = count($r);

for ($i = 0; $i < $top; $i++) {
    $cmd = substr($r[$i], 0, 3);
    if ($cmd == "acc") {
        continue;
    } elseif ($cmd == "jmp") {
        $m = $r;
        $m[$i] = "nop";
        check_inf($m);
    } elseif ($cmd == "nop") {
        $m = $r;
        $m[$i] = "jmp " . substr($r[$i], 4);
        check_inf($m);
    }
}

function check_inf($r) {
    $acc = 0;
    $ptr = 0;
    $inf = false;
    $seen = [];
    while (!$inf) {
        if (!isset($seen[$ptr])) {
            $seen[$ptr] = true;
        } else {
            $inf = true;
        }
        if ($ptr >= count($r) - 1) {
            echo "ACC IS $acc\n";
            die;
        }
        $cmd = $r[$ptr];
        $p = explode(" ", $cmd);
        if ($p[0] == "nop") {
            $ptr++;
        } elseif ($p[0] == "acc") {
            $acc += (int)$p[1];
            $ptr++;
        } elseif ($p[0] == "jmp") {
            $ptr += (int)$p[1];                
        }
    }
}
