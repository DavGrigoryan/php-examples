<?php
function printMultiplicationTable(int $number): void
{
    if ($number <= 0) {
        echo 'Must be greater than 0';
        exit;
    }

    $counter = 1;
    while ($counter <= $number) {
        echo ' ' . $counter;
        $counter++;
    }

    echo "\n-----------\n";

    for ($i = 1; $i <= $number; $i++) {
        echo $i . '|';
        for ($j = 1; $j <= $number; $j++) {
            echo $j * $i . ' ';
        }
        echo "\n";
    }
}

printMultiplicationTable(4);
