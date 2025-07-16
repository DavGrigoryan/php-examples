<?php
/*
 * The function findPair takes an array of integers $nums and a target value $target as input
 * and returns the indices of the first pair of elements whose sum is equal to $target.
 * If no such pair is found, it returns [-1,-1].
 */
function findPair($nums, $target)
{
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($nums[$i] + $nums[$j] == $target) {
                return array($i, $j);
            }
        }
    }

    return array(-1, -1);
}


$nums = array(2, 7, 11, 15);
$target = 9;
$pair = findPair($nums, $target);
if ($pair[0] != -1) {
    echo "Pair found at indices: " . $pair[0] . " and " . $pair[1]; // Output: Pair found at indices: 0 and 1
} else {
    echo "Pair not found";
}