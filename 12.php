<?php
$r = explode("\n", file_get_contents("12.in"));
$blank = array_pop($r);

/*
$r = [
'F10',
'N3',
'F7',
'R90',
'F11',
];
 */
$start_x = 0;
$start_y = 0;
$face = 1;
$dirs = ['N', 'E', 'S', 'W'];

foreach ($r as $l) {
    $dir = substr($l, 0, 1);
    $amt = (int)substr($l, 1);
    echo "Parsed $l into $dir and $amt ";
    if ($dir == 'E') {
        $start_x += $amt;
        echo "Moved X to $start_x\n";
    } elseif ($dir == 'N') {
        $start_y += $amt;
        echo "Moved Y to $start_y\n";
    } elseif ($dir == 'S') {
        $start_y -= $amt;
        echo "Moved Y to $start_y\n";
    } elseif ($dir == 'W') {
        $start_x -= $amt;
        echo "Moved X to $start_x\n";
    } elseif ($dir == 'F') {
        switch ($dirs[$face]) {
            case 'E':
                $start_x += $amt;
                echo "Moved FEX to $start_x\n";
                break;
            case 'N':
                $start_y += $amt;
                echo "Moved FNY to $start_y\n";
                break;
            case 'S':
                $start_y -= $amt;
                echo "Moved FSY to $start_y\n";
                break;
            case 'W':
                $start_x -= $amt;
                echo "Moved FWX to $start_x\n";
                break;
        }
    } elseif ($dir == 'L') {
        $rot = $amt % 360;
        $num = $rot / 90;
        echo "FACE: $face ";
        $face = ($face - $num) % 4;
        if ($face < 0) {
            $face += 4;
        }
        echo "ROT: $rot NUM: $num NEWFACE: $face\n";
    } elseif ($dir == 'R') {
        $rot = $amt % 360;
        $num = $rot / 90;
        echo "FACE: $face ";
        $face = ($face + $num) % 4;
        echo "ROT: $rot NUM: $num NEWFACE: $face\n";
    }
}

echo "END: $start_x $start_y\n";
