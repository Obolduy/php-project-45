<?php

namespace BrainGames\Games\BrainEven;

function generateEvenOrOddValue(array $config): array
{
    $number = rand(1, 1000);

    $correctAnswer = $number % 2 === 0 ? $config['answers']['yes'] : $config['answers']['no'];

    return [$number, $correctAnswer];
}
