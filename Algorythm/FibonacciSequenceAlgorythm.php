<?php
function fibonacci($n): array
{
    $fib = [0, 1]; // Initialize an array with the first two numbers of the Fibonacci sequence

    for ($i = 2; $i < $n; $i++) { // Loop through the sequence until we reach the desired number $n
        // Calculate the next number in the sequence by adding the two preceding numbers
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib;
}

// Test the function
$result = fibonacci(10);
print_r($result);