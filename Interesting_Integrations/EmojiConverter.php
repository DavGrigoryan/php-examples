<?php
/**
 * Emoji Converter
 *
 * A PHP script that converts emoticons to their equivalent emoji representation.
 */

function convertEmoticonsToEmoji($text)
{
    $emoticons = [
        ':)' => '😊',
        ':D' => '😃',
        ':(' => '☹️',
        ';)' => '😉',
        ':O' => '😮',
        ':P' => '😛',
        ':3' => '😺',
        ':|' => '😐',
        ':/' => '😕',
    ];

    $emojiText = str_replace(array_keys($emoticons), array_values($emoticons), $text);
    return $emojiText;
}

// Example usage
$text = 'I am feeling :D today! How about you? :P';
$emojiText = convertEmoticonsToEmoji($text);
echo $emojiText;
