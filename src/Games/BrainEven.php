<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\run;

function startGame(): void
{
    run(getGameDescription(), generateRound(...));
}

function getGameDescription(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function generateRound(): array
{
    $number = rand(1, 1000);
    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return [(string) $number, $correctAnswer];
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
