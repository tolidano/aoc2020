<?php
$r = explode("\n", file_get_contents("11.in"));
$blank = array_pop($r);
$moves = 0;
while ($moves < 1 || $m != $r) {
    $m = $r;
    for ($i = 0; $i < count($m); $i++) {
        for ($j = 0; $j < strlen($m[0]); $j++) {
            if (substr($m[$i], $j, 1) == ".") {
                continue;
            }
            $occupied = 0;
            if ($i > 0 && $j > 0 && substr($m[$i - 1], $j - 1, 1) == "#") {
                $occupied++; // UL
            }
            if ($i < count($m) - 1 && $j > 0 && substr($m[$i + 1], $j - 1, 1) == "#") {
                $occupied++; // DL
            }
            if ($i > 0 && substr($m[$i - 1], $j, 1) == "#") {
                $occupied++; // U
            }
            if ($i < count($m) - 1 && substr($m[$i + 1], $j, 1) == "#") {
                $occupied++; // D
            }
            if ($i < count($m) - 1 && $j < strlen($m[0]) - 1 && substr($m[$i + 1], $j + 1, 1) == "#") {
                $occupied++; // DR
            }
            if ($i > 0 && $j < strlen($m[0]) - 1 && substr($m[$i - 1], $j + 1, 1) == "#") {
                $occupied++; // UR
            }
            if ($j > 0 && substr($m[$i], $j - 1, 1) == "#") {
                $occupied++; // L
            }
            if ($j < strlen($m[0]) - 1 && substr($m[$i], $j + 1, 1) == "#") {
                $occupied++; // R
            }
            if ($occupied == 0 && substr($m[$i], $j, 1) == "L") {
                if ($j > 0 && $j < strlen($m[$i]) - 1) {
                    $r[$i] = substr($r[$i], 0, $j) . "#" . substr($m[$i], $j + 1);
                    echo "X1\n";
                } elseif ($j == 0) {
                    $r[$i] = "#" . substr($m[$i], 1);
                    echo "X2\n";
                } else {
                    $r[$i] = substr($r[$i], 0, -1) . "#";
                    echo "X3\n";
                }
                $ml = strlen($m[$i]);
                $rl = strlen($r[$i]);
                echo "($i) OLDSIT: {$m[$i]} ($ml)\n($i) NEWSIT: {$r[$i]} ($rl)\n";
                //if ($rl != 92) { die; }
            }
            if ($occupied >= 4 && substr($m[$i], $j, 1 ) == "#") {
                if ($j > 0 && $j < strlen($m[$i]) - 1) {
                    $r[$i] = substr($r[$i], 0, $j) . "L" . substr($m[$i], $j + 1);
                    echo "Y1\n";
                } elseif ($j == 0) {
                    $r[$i] = "L" . substr($m[$i], 1);
                    echo "Y2\n";
                } else {
                    $r[$i] = substr($r[$i], 0, -1) . "L";
                    echo "Y3\n";
                }
                $ml = strlen($m[$i]);
                $rl = strlen($r[$i]);
                echo "($i) OLDSIT: {$m[$i]} ($ml)\n($i) NEWSIT: {$r[$i]} ($rl)\n";
                //if ($rl != 92) { die; }
            }
        }
    } 
    $moves++;
    echo "OLD:\n";
    print_r($m);
    echo "NEW:\n";
    print_r($r);
}
echo "STEADY\n";
$occupied = 0;
for ($i = 0; $i < count($m); $i++) {
    for ($j = 0; $j < strlen($m[0]); $j++) {
        if (substr($m[$i], $j, 1) == "#") {
            $occupied++;
        } 
    }
}
echo "OCCUPIED: $occupied\n";
