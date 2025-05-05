<?php
/**
 * Given the string, check if it is a palindrome.
 * Palindrome is:
 * A string that doesn't change when reversed (it reads the same backward and forward).
 * Examples:
 * "eye" is a palindrome
 * "noon" is a palindrome
 * "decaf faced" is a palindrome
 *
 * Example:
 * For inputString = "aabaa", the output should be
 * solution(inputString) = true
 * For inputString = "abac", the output should be
 * solution(inputString) = false
 * For inputString = "a", the output should be
 * solution(inputString) = true
 */
function solution($inputString)
{
    return $inputString == strrev($inputString);
}
