<?php

/*
 * The function works by splitting the array into smaller and smaller pieces
 * eventually merging the array back together again at the end.
 * It does this by first finding a middle point and then spitting the array depending on
 * if the current value is higher or lower than the middle value.
 * It then recursively calls itself in order to do the same to each section of the array.
 */
function quickSort(array $array)
{
    if (!$length = count($array)) {
        return $array;
    }

    $k = $array[0];
    $newArrN1 = $newArrN2 = array();

    for ($i = 1; $i < $length; $i++) {
        if ($array[$i] <= $k) {
            $newArrN1[] = $array[$i];
        } else {
            $newArrN2[] = $array[$i];
        }
    }
    return array_merge(quickSort($newArrN1), array($k), quickSort($newArrN2));
}