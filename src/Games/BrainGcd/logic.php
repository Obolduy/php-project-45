<?php

namespace BrainGames\Games\BrainGcd;

function generateGcdValue(): array
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);

    $correctAnswer = gmp_strval(gmp_gcd($firstNumber, $secondNumber));

    return ["$firstNumber $secondNumber", $correctAnswer];
}
