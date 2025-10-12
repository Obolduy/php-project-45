<?php

namespace BrainGames\Games\BrainPrime;

function generatePrimeValue(array $config): array
{
    $number = rand(1, 100);
    $correctAnswer = isPrime($number) ? $config['answers']['yes'] : $config['answers']['no'];

    return [$number, $correctAnswer];
}

function isPrime(int $number): bool
{
    if ($number === 2) {
        return true;
    }

    if ($number < 2 || $number % 2 === 0) {
        return false;
    }

    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}