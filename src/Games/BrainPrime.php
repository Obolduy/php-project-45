<?php

namespace BrainGames\Games\BrainPrime;

function getGameDescription(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generateRound(): array
{
    $number = rand(1, 100);
    $correctAnswer = isPrime($number) ? 'yes' : 'no';

    return [(string) $number, $correctAnswer];
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
