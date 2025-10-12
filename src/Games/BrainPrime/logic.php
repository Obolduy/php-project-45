<?php

namespace BrainGames\Games\BrainPrime;

function generatePrimeValue(array $config): array
{
    $number = rand(1, 100);
    $prime = gmp_prob_prime($number);

    $correctAnswer = in_array($prime, [1, 2]) ? $config['answers']['yes'] : $config['answers']['no'];

    return [$number, $correctAnswer];
}