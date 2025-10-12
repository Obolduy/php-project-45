<?php

namespace BrainGames\Games\BrainGcd;

function generateGcdValue(): array
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);

    $correctAnswer = calculateGcd($firstNumber, $secondNumber);

    return ["$firstNumber $secondNumber", (string) $correctAnswer];
}

function calculateGcd(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;

        $b = $a % $b;

        $a = $temp;
    }

    return $a;
}