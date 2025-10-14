<?php

namespace BrainGames\Games\BrainCalc;

function generateCalculationValue(): array
{
    $firstNumber = rand(1, 10);
    $secondNumber = rand(1, 10);

    $expression = getCalculatedExpression($firstNumber, $secondNumber);

    return [$expression['expression_text'], (string) $expression['expression_answer']];
}

function getCalculatedExpression(int $firstNumber, int $secondNumber): array
{
    return match (rand(1, 3)) {
        1 => ['expression_text' => "$firstNumber + $secondNumber", 'expression_answer' => $firstNumber + $secondNumber],
        2 => ['expression_text' => "$firstNumber - $secondNumber", 'expression_answer' => $firstNumber - $secondNumber],
        3 => ['expression_text' => "$firstNumber * $secondNumber", 'expression_answer' => $firstNumber * $secondNumber],
    };
}
