<?php

namespace BrainGames\Games\BrainProgression;

function generateProgressionValue(): array
{
    $progression = getProgression();

    $randKey = array_rand($progression);

    $correctAnswer = (string) $progression[$randKey];

    $progression[$randKey] = '..';

    return [implode(' ', $progression), $correctAnswer];
}

function getProgression(): array
{
    $maxNumbersInArray = 10;

    $firstNumber = rand(1, 10);
    $progressionValue = rand(1, 10);

    $progression = [$firstNumber];

    for ($i = 1; $i < $maxNumbersInArray; $i++) {
        $progression[] = $progression[$i - 1] + $progressionValue;
    }

    return $progression;
}
