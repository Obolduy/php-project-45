<?php

namespace BrainGames\Engine;

use BrainGames\Games\BrainEven;
use BrainGames\Games\BrainCalc;

require_once __DIR__ . '/../src/Games/BrainEven/logic.php';
require_once __DIR__ . '/../src/Games/BrainCalc/logic.php';

function start(array $config, string $gameName, string $userName, string $greetingsMessage): void
{
    echo $greetingsMessage . PHP_EOL;

    run($config, $gameName);

    echo "Congratulations, $userName!" . PHP_EOL;
}

function run(array $config, string $gameName): void
{
    $correctAnswersCountGoal = 3;
    $currentCorrectAnswersCount = 0;

    while ($currentCorrectAnswersCount < $correctAnswersCountGoal) {
        $answer = handleQuestion($config, $gameName);

        $currentCorrectAnswersCount = $answer['is_correct'] ? $currentCorrectAnswersCount + 1 : 0;

        echo $answer['output_text'] . PHP_EOL;
    }
}

function handleQuestion(array $config, string $gameName): array
{
    [$question, $correctAnswer] = getQuestion($config, $gameName);

    echo "Question: $question" . PHP_EOL;

    $answer = readline("Your answer: ");

    return $answer === $correctAnswer
        ? ['is_correct' => true, 'output_text' => $config['messages']['correct']]
        : ['is_correct' => false, 'output_text' => sprintf($config['messages']['incorrect'], $answer, $correctAnswer)];
}

function getQuestion(array $config, string $gameName): array
{
    return match ($gameName) {
        $config['games']['brain_calc'] => BrainCalc\generateCalculationValue(),
        default                        => BrainEven\generateEvenOrOddValue($config),
    };
}