<?php
$r = file_get_contents("2.in");
$l = explode("\n", $r);
$d = $f = $a = 0;
foreach ($l as $li) {
    $p = explode(" ", $li);
    if (strpos($p[0], "down") !== false) {
        $a += $p[1];
    } elseif (strpos($p[0], "forw") !== false) {
        $f += $p[1];
        $d += $a * $p[1];
    } else {
        $a -= $p[1];
    }
}
echo $d * $f;
