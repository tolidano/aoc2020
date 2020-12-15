<?php
$said = [20,9,11,0,1,2];
$last = 2;
while (count($said) <= 2020) {
    echo "[" . implode(",", $said) . "] ";
    $wo = $said;
    array_pop($wo);
    if (!in_array($last, $wo)) {
        $last = 0;
        echo "Setting new last to 0 ";
    } else {
        echo "Turns: " . count($said) . " And Most Recent Turn (Reverse): " .  array_search($last, array_reverse($wo)). " ";
        $key = count($wo) - array_search($last, array_reverse($wo));
        echo "So Turn: $key ";
        $last = count($said) - $key;
        echo "Diff: " . count($said) . " SO diff: $last ";
    }
    echo "Adding $last ";
    $said[] = $last;
    echo "[" . implode(",", $said) . "] ";
    echo "\n======\n";
}
echo $last;
