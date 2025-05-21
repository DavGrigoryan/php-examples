<?php
/**
 * Rock Paper Scissors Game
 *
 * Simulates a simple game of Rock, Paper, Scissors between a player and the computer.
 */

function playGame($playerChoice)
{
    $choices = ['rock', 'paper', 'scissors'];
    $computerChoice = $choices[array_rand($choices)];

    echo "Player chooses: $playerChoice\n";
    echo "Computer chooses: $computerChoice\n";

    if ($playerChoice == $computerChoice) {
        echo "It's a tie!\n";
    } elseif (
        ($playerChoice == 'rock' && $computerChoice == 'scissors') ||
        ($playerChoice == 'paper' && $computerChoice == 'rock') ||
        ($playerChoice == 'scissors' && $computerChoice == 'paper')
    ) {
        echo "Player wins!\n";
    } else {
        echo "Computer wins!\n";
    }
}

// Example usage
$playerChoice = 'rock';
playGame($playerChoice);
