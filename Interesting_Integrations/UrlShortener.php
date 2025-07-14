<?php
/**
 * URL Shortener
 *
 * A PHP script that shortens long URLs using a hash algorithm.
 */

class URLShortener
{
    public function shortenURL($url): string
    {
        $hash = $this->generateHash($url);

        return "https://your-domain.com/$hash"; // Replace with your actual domain
    }

    private function generateHash($url): string
    {
        $hash = md5($url);
        return substr($hash, 0, 8);
    }
}

// Example usage
$shortener = new URLShortener();

// Shorten a URL
$longURL = "https://www.example.com/very/long/url";
$shortURL = $shortener->shortenURL($longURL);
echo "Long URL: $longURL\nShort URL: $shortURL\n";
