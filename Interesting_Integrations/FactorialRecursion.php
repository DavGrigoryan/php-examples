<?php
// PHP code to get the factorial of a number

// Method 2: Use of recursion
function factorial($number): float|int
{
    if ($number <= 1) {
        return 1;
    } else {
        return $number * Factorial($number - 1);
    }
}

$number = 5;
$fact = factorial($number);
echo $number . '! = ' . $fact;