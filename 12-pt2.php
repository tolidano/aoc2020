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
$wp_x = 10;
$wp_y = 1;
$ship_x = 0;
$ship_y = 0;

foreach ($r as $l) {
    $dir = substr($l, 0, 1);
    $amt = (int)substr($l, 1);
    echo "Parsed $l into $dir and $amt ";
    if ($dir == 'E') {
        $wp_x += $amt;
        echo "Moved X to $wp_x\n";
    } elseif ($dir == 'N') {
        $wp_y += $amt;
        echo "Moved Y to $wp_y\n";
    } elseif ($dir == 'S') {
        $wp_y -= $amt;
        echo "Moved Y to $wp_y\n";
    } elseif ($dir == 'W') {
        $wp_x -= $amt;
        echo "Moved X to $wp_x\n";
    } elseif ($dir == 'F') {
        echo "Ship: $ship_x $ship_y WP: $wp_x $wp_y ";
        $ship_x += $amt * $wp_x;
        $ship_y += $amt * $wp_y;
        echo "Ship Now: $ship_x $ship_y\n";
    } elseif ($dir == 'L' || $dir == 'R') {
        $rot = $amt % 360;
        echo "WPX: $wp_x WPY: $wp_y ";
        if ($wp_x >= 0 && $wp_y >= 0) {
            $q = 1;
        } elseif ($wp_x >= 0 && $wp_y <= 0) {
            $q = 2;
        } elseif ($wp_x <= 0 && $wp_y <= 0) {
            $q = 3;
        } elseif ($wp_x <= 0 && $wp_y >= 0) {
            $q = 4;
        }
        if ($rot == 180) {
            $wp_x *= -1;
            $wp_y *= -1;
        } else {
            //90 or 270, L or R
            $dq = ($q + ($dir == 'L' ? 1 : -1)) % 4;
            if ($dq < 1) {
                $dq += 4;
            }
            echo "Q: $q DQ: $dq "; 
            if ($q == 1 && $dq == 2) {
                $t = $wp_x;
                $wp_x = -1 * $wp_y;
                $wp_y = $t;
            } elseif ($q == 1 && $dq == 4) {
                $t = $wp_x;
                $wp_x = $wp_y;
                $wp_y = -1 * $t;
            } elseif ($q == 2 && $dq == 1) {
                $t = $wp_x;
                $wp_x = $wp_y;
                $wp_y = $t * -1;
            } elseif ($q == 2 && $dq == 3) {
                $t = $wp_x;
                $wp_x = $wp_y;
                $wp_y = -1 * $t;
            } elseif ($q == 3 && $dq == 2) {
                $t = $wp_x;
                $wp_x = $wp_y;
                $wp_y = -1 * $t;
            } else {
                echo "UNHANDLED! $q $dq ";
            }
        }
        echo "ROT: $rot NUM: $num NWPX: $wp_x NWPY: $wp_y\n";
    }
}

echo "END: $wp_x $wp_y $ship_x $ship_y\n";
