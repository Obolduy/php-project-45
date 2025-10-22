<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\run;

function startGame(): void
{
    run(getGameDescription(), generateRound(...));
}

function getGameDescription(): string
{
    return 'What is the result of the expression?';
}

function generateRound(): array
{
    $firstNumber = rand(1, 10);
    $secondNumber = rand(1, 10);

    $expression = getCalculatedExpression($firstNumber, $secondNumber);

    return [$expression['expression_text'], (string) $expression['expression_answer']];
}

function getCalculatedExpression(int $firstNumber, int $secondNumber): array
{
    $operation = CalculationOperationEnum::from(rand(1, 3));

    return [
        'expression_text'   => getCalculationText($firstNumber, $secondNumber, $operation),
        'expression_answer' => calculate($firstNumber, $secondNumber, $operation),
    ];
}

function calculate(int $firstNumber, int $secondNumber, CalculationOperationEnum $operation): int
{
    return match ($operation) {
        CalculationOperationEnum::Add      => $firstNumber + $secondNumber,
        CalculationOperationEnum::Subtract => $firstNumber - $secondNumber,
        CalculationOperationEnum::Multiply => $firstNumber * $secondNumber,
    };
}

function getCalculationText(int $firstNumber, int $secondNumber, CalculationOperationEnum $operation): string
{
    return match ($operation) {
        CalculationOperationEnum::Add      => "$firstNumber + $secondNumber",
        CalculationOperationEnum::Subtract => "$firstNumber - $secondNumber",
        CalculationOperationEnum::Multiply => "$firstNumber * $secondNumber",
    };
}
