<?php

namespace BrainGames\Games\BrainCalc;

function generateCalculationValue(): array
{
    $firstNumber = rand(1, 10);
    $secondNumber = rand(1, 10);

    $expression = match (rand(1, 4)) {
        1 => ['expression_text' => "$firstNumber + $secondNumber", 'expression_answer' => $firstNumber + $secondNumber],
        2 => ['expression_text' => "$firstNumber - $secondNumber", 'expression_answer' => $firstNumber - $secondNumber],
        3 => ['expression_text' => "$firstNumber * $secondNumber", 'expression_answer' => $firstNumber * $secondNumber],
        4 => ['expression_text' => "$firstNumber / $secondNumber", 'expression_answer' => $firstNumber / $secondNumber],
    };

    return [$expression['expression_text'], (string) round($expression['expression_answer'])];
}
