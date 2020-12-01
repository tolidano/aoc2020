<?php

$d = file_get_contents("1.in");
$r = explode("\n", $d);
foreach ($r as $a) {
    foreach ($r as $b) {
        foreach ($r as $c) {
            $sum = (int)$a + (int)$b + (int)$c;
            if ($sum == 2020) {
                echo $a * $b * $c. "\n\n";
            }        
        }
    }
}
