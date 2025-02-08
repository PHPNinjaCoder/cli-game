<?php

function displayWelcomeMessage() {
    echo "Welcome to the Number Guessing Game!\n";
    echo "I'm thinking of a number between 1 and 100.\n";
    echo "You need to guess the correct number within a limited number of chances based on the difficulty level.\n";
}

function getDifficultyLevel() {
    echo "Please select the difficulty level:\n";
    echo "1. Easy (10 chances)\n";
    echo "2. Medium (5 chances)\n";
    echo "3. Hard (3 chances)\n";
    $choice = intval(trim(fgets(STDIN)));
    
    switch ($choice) {
        case 1:
            return 10;  // Easy
        case 2:
            return 5;   // Medium
        case 3:
            return 3;   // Hard
        default:
            echo "Invalid choice. Defaulting to Medium.\n";
            return 5;   // Default
    }
}

function playGame($chances) {
    $numberToGuess = rand(1, 100);
    $attempts = 0;

    while ($attempts < $chances) {
        echo "\nYou have " . ($chances - $attempts) . " chances left.\n";
        echo "Enter your guess: ";
        $guess = intval(trim(fgets(STDIN)));
        $attempts++;

        if ($guess === $numberToGuess) {
            echo "Congratulations! You guessed the correct number in $attempts attempts.\n";
            return true;
        } elseif ($guess < $numberToGuess) {
            echo "Incorrect! The number is greater than $guess.\n";
        } else {
            echo "Incorrect! The number is less than $guess.\n";
        }
    }

    echo "Sorry, you've run out of chances! The correct number was $numberToGuess.\n";
    return false;
}

function playAgain() {
    echo "Do you want to play again? (yes/no): ";
    $response = trim(fgets(STDIN));
    return strtolower($response) === 'yes';
}

function main() {
    do {
        displayWelcomeMessage();
        $chances = getDifficultyLevel();
        playGame($chances);
    } while (playAgain());

    echo "Thank you for playing!\n";
}

main();