<?php
/**
 * Weather Forecast API Integration
 *
 * Fetches weather forecast data using a weather API and displays it in a user-friendly format.
 */

$apiKey = 'YOUR_API_KEY'; // Replace with your actual API key

function getWeatherForecast($city)
{
    global $apiKey;

    // API endpoint URL
    $url = "https://api.weatherapi.com/v1/forecast.json?key={$apiKey}&q={$city}&days=3";

    // Make API request
    $response = file_get_contents($url);

    // Parse JSON response
    $data = json_decode($response, true);

    // Extract relevant information from the response
    $location = $data['location']['name'];
    $country = $data['location']['country'];
    $forecastDays = $data['forecast']['forecastday'];

    echo "Weather forecast for {$location}, {$country}:\n";

    foreach ($forecastDays as $day) {
        $date = $day['date'];
        $condition = $day['day']['condition']['text'];
        $tempC = $day['day']['avgtemp_c'];
        $tempF = $day['day']['avgtemp_f'];

        echo "Date: {$date}\n";
        echo "Condition: {$condition}\n";
        echo "Temperature: {$tempC}°C / {$tempF}°F\n\n";
    }
}

// Example usage
$city = 'New York';
getWeatherForecast($city);
