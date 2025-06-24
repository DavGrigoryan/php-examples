<?php
/**
 * Movie Recommendation System
 *
 * A PHP script that recommends movies to users based on their preferences.
 */
class MovieRecommendationSystem
{
    private $movies = [
        ['title' => 'Inception', 'genre' => 'Sci-Fi'],
        ['title' => 'The Dark Knight', 'genre' => 'Action'],
        ['title' => 'Pulp Fiction', 'genre' => 'Crime'],
        ['title' => 'The Shawshank Redemption', 'genre' => 'Drama'],
        ['title' => 'The Godfather', 'genre' => 'Crime'],
        ['title' => 'Fight Club', 'genre' => 'Drama'],
        ['title' => 'The Matrix', 'genre' => 'Sci-Fi'],
        ['title' => 'Goodfellas', 'genre' => 'Crime'],
    ];

    public function recommendMovie($genre)
    {
        $recommendedMovies = [];

        foreach ($this->movies as $movie) {
            if ($movie['genre'] === $genre) {
                $recommendedMovies[] = $movie['title'];
            }
        }

        if (empty($recommendedMovies)) {
            return "Sorry, no movies found in the {$genre} genre.";
        }

        $randomIndex = array_rand($recommendedMovies);
        $recommendedMovie = $recommendedMovies[$randomIndex];

        return "Recommended movie: {$recommendedMovie}";
    }
}

// Example usage
$recommendationSystem = new MovieRecommendationSystem();
$genre = 'Sci-Fi';
$recommendation = $recommendationSystem->recommendMovie($genre);

echo $recommendation;