<?php

function binarySearch(array $arr, $x): bool
{
    // check for empty array
    if (count($arr) === 0) return false;
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
        $mid = floor(($low + $high) / 2); // compute middle index

        if ($arr[$mid] == $x) { // element found at mid
            return true;
        }

        if ($x < $arr[$mid]) { // search the left side of the array
            $high = $mid - 1;
        } else { // search the right side of the array
            $low = $mid + 1;
        }
    }

    return false; // If we reach here element x doesn't exist
}

// Driver code
$arr = array(1, 2, 3, 4, 5);
$value = 5;

if (binarySearch($arr, $value)) {
    echo $value . " Exists";
} else {
    echo $value . " Doesnt Exist";
}