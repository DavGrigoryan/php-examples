<?php
// PHP code to get the factorial of a number

// Method 1: Iterative way
function factorial($number): float|int
{
    $factorial = 1;
    for ($i = 1; $i <= $number; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

$number = 5;
$fact = factorial($number);
echo $number . '! = ' . $fact;