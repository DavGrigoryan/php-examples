<?php
/*
 * This function is able to find "**" from text and replace it with HTML tag,
 * below are the examples in which case it will be replaced (true) and in which case it will not be replaced (false)
 * "**example**"    => true
 * "** example**"   => false
 * "**example **"   => false
 * "**example"      => false
 * "example**"      => false
 */
function ReplaceAsterisksInTextWithBold(string $text, string $htmlTagOpening, string $htmlTagClosing): string
{
    $asteriskArray = $duplicateAsteriskArray = preg_split('/(\*\*)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    $asteriskCount = count($asteriskArray);

    if ($asteriskCount <= 1) { // If there is no asterisk in the text
        return $text;
    }

    $i = 0;

    // As long as an asterisk exists in the text
    while (($found = array_search("**", $duplicateAsteriskArray)) !== false && $i < $asteriskCount) {
        $i++;
        unset($duplicateAsteriskArray[$found]);

        if (isset($asteriskArray[$found + 1]) &&
            isset($asteriskArray[$found + 2]) &&
            !str_starts_with($asteriskArray[$found + 1], ' ') &&
            !str_ends_with($asteriskArray[$found + 1], ' ')) {
            $asteriskArray[$found] = $htmlTagOpening;
            $asteriskArray[$found + 2] = $htmlTagClosing;
        }
    }

    return implode('', $asteriskArray);
}

$str = "**Lorem Ipsum** is simply dummy text of the printing and typesetting industry.";
echo ReplaceAsterisksInTextWithBold($str, '<strong>', '</strong>');
