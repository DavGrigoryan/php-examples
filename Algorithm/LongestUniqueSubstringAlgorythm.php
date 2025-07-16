<?php
function longest_unique_substring($str)
{
    $n = strlen($str);
    $max_len = 0;
    $last_seen = array();

    // Loop through the string, keeping track of the last seen index of each character
    for ($i = 0, $j = 0; $j < $n; $j++) {
        if (array_key_exists($str[$j], $last_seen)) {
            // If we've seen this character before, move the start of the substring past the last occurrence
            $i = max($i, $last_seen[$str[$j]] + 1);
        }
        // Update the last seen index of this character
        $last_seen[$str[$j]] = $j;

        // Update the maximum length of the substring if needed
        $max_len = max($max_len, $j - $i + 1);
    }

    return $max_len;
}

// Test the function with an example string
$str = "abcabcbb";
$longest_len = longest_unique_substring($str);
echo "The length of the longest substring with unique characters in the string '$str' is: " . $longest_len;