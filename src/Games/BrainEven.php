<?php

namespace BrainGames\Games\BrainEven;

function getGameDescription(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function generateRound(): array
{
    $number = rand(1, 1000);
    $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

    return [(string) $number, $correctAnswer];
}
