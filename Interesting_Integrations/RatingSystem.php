<?php
/**
 * Star Rating System
 *
 * A PHP script that allows users to rate items and calculates the average rating.
 */

class StarRatingSystem
{
    private $ratings = [];

    public function addRating($itemId, $rating)
    {
        $this->ratings[$itemId][] = $rating;
    }

    public function getAverageRating($itemId)
    {
        print_r($this->ratings);
        if (!isset($this->ratings[$itemId])) {
            return null;
        }

        $ratings = $this->ratings[$itemId];
        $totalRatings = count($ratings);
        $sum = array_sum($ratings);
        $average = $sum / $totalRatings;

        return round($average, 2);
    }
}

// Example usage
$ratingSystem = new StarRatingSystem();

// Add ratings for items
$ratingSystem->addRating(1, 4);
$ratingSystem->addRating(1, 5);
$ratingSystem->addRating(2, 3);
$ratingSystem->addRating(2, 2);
$ratingSystem->addRating(2, 4);

// Calculate and display average ratings
$item1AverageRating = $ratingSystem->getAverageRating(1);
$item2AverageRating = $ratingSystem->getAverageRating(2);

echo "Item 1 Average Rating: " . ($item1AverageRating ?? "No ratings yet") . "\n";
echo "Item 2 Average Rating: " . ($item2AverageRating ?? "No ratings yet") . "\n";
