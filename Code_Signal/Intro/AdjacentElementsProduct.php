<?php
/**
 * Given an array of integers, find the pair of adjacent elements that has the largest product and return that product.
 * Example:
 * For inputArray = [3, 6, -2, -5, 7, 3], the output should be
 * solution(inputArray) = 21
 * 7 and 3 produce the largest product.
 */
function solution($inputArray)
{
    $inputArrayLength = count($inputArray);
    $largestProduct = $inputArray[0] * $inputArray[1];

    for ($i = 1; $i < $inputArrayLength - 1; $i++) {
        $currentProduct = $inputArray[$i] * $inputArray[$i + 1];
        $largestProduct = max($largestProduct, $currentProduct);
    }

    return $largestProduct;
}
