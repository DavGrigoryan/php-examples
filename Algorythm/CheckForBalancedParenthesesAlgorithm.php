<?php

function changeCharacter(string $value): ?string
{
    return match ($value) {
        '{' => '}',
        '}' => '{',
        '[' => ']',
        ']' => '[',
        '(' => ')',
        ')' => '(',
        default => null,
    };
}

function isValidScope(string $str): bool
{
    $chars = str_split($str);
    $arr = [];

    foreach ($chars as $char) {
        $reverseChar = changeCharacter($char);
        $lastValueArr = end($arr);

        if (!$reverseChar) { // return false if there is another character in the string
            return false;
        }

        if ($reverseChar == $lastValueArr) { // if a match is found, delete it from the array
            $searchKey = array_search($reverseChar, $arr);
            unset($arr[$searchKey]);
        } else if ($char == '}' || $char == ']' || $char == ')') {
            // if its counterpart is not found and the following characters are present, then return "false"
            return false;
        } else {
            $arr[] = $char;
        }
    }

    return empty($arr);
}

/*
 * '{[]}' => true,
 * '[[]{()}[{{}}]]' => true,
 * '{}[]{()}[({{{}}})]' => true,
 * '}{' => false,
 * '[}{]{()}[{{}}]' => false,
 * '[{}(){(])}]' => false,
 */
$result = isValidScope('[[]{()}[{{}}]]');