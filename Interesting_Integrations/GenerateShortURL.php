<?php
/**
 * URL Shortener
 *
 * Generates short URLs for long URLs using a simple hash algorithm.
 */

function generateShortURL($url)
{
    $hash = substr(md5($url), 0, 8); // Generate a unique hash based on the URL
    $shortURL = "https://your-domain.com/{$hash}"; // Replace with your actual domain

    return $shortURL;
}

// Example usage
$longURL = "https://www.example.com/very/long/url";
$shortURL = generateShortURL($longURL);

echo "Long URL: {$longURL}\n";
echo "Short URL: {$shortURL}\n";