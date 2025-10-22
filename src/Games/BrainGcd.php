<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\run;

function startGame(): void
{
    run(getGameDescription(), generateRound(...));
}

function getGameDescription(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function generateRound(): array
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);

    $correctAnswer = calculateGcd($firstNumber, $secondNumber);

    return ["$firstNumber $secondNumber", (string) $correctAnswer];
}

function calculateGcd(int $firstNumber, int $secondNumber): int
{
    while ($secondNumber !== 0) {
        $temp = $secondNumber;

        $secondNumber = $firstNumber % $secondNumber;

        $firstNumber = $temp;
    }

    return $firstNumber;
}
