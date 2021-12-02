<?php
ini_set('memory_limit', -1);

echo "LOOKING FOR [20,9,11,0,1,2,0,3,0,2,4,0,3,5,0,3,3,1,13,0,5,7...\n";

$start = time();
$said = [20,9,11,0,1,2];
$last = 2;
$last_seen = [
    20 => 1,
    9 => 2,
    11 => 3,
    0 => 4,
    1 => 5,
    2 => 6,
];
$wo = [20, 9, 11, 0, 1];
while (count($said) <= 10) {
    $old_last = $last;
    if (!in_array($last, $wo)) {
        $last = 0;
        echo "Setting Last 0 ";
    } else {
        $key = $last_seen[$last];
        echo "KEY: $key ";
        $last = count($said) - $key;
        echo "LAST: $last ";
    }
    echo "Adding $last to SAID ";
    $said[] = $last;
    echo "Adding $old_last To WO ";
    $wo[] = $old_last;
    echo "Setting Last Seen for $last to " . count($said) . "\n";
    echo "[" . implode(",", $said) . "]\n";
    echo "[" . implode(",", $wo) . "]\n";
    echo "[" . implode(",", $last_seen) . "]\n";
    $old_last_seen = $last_seen[$last];
    echo "Previous Last Seen: $old_last_seen\n";
    $last_seen[$last] = count($said);
    if (count($said) % 10000 == 0) {
        echo "RUNNING " . count($said) . "\n";
    }
    echo "======\n";
}
echo "[" . implode(",", $said) . "] ";
