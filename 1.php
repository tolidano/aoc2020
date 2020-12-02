<?php
/* I have no problem taking the brute force way.
 * This is n^3 (part 2 of the problem, but part 1 was n^2, just missing the inner c loop
 * Try all possible options, when you find what you want, echo the multiplication
 */

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
