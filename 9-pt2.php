<?php
$i = file_get_contents("9.in");
$r = explode("\n", $i);
$target = 1492208709;

for ($i = 0; $i < count($r) - 2; $i++) {
    check_start($r, $i, $target);
}

function check_start($r, $i, $target) {
    $start = $r[$i];
    $starti = $i;
    $sum = 0;
    $max = 0;
    $min = $target;
    while ($sum < $target) {
        $sum += $r[$i];
        if ($max < $r[$i]) {
            $max = $r[$i];
        }
        if ($min > $r[$i]) {
            $min = $r[$i];
        }
        $last = $r[$i];
        $i += 1;
    }
    if ($sum == $target) {
        echo "GOT IT\n";
        echo "START: $starti END: $i\n";
        echo $min+$max . "\n";
        die;
    }
}
