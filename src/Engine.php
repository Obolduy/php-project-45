<?php

namespace BrainGames\Engine;

use BrainGames\Games\BrainEven;
use BrainGames\Games\BrainCalc;
use BrainGames\Games\BrainGcd;
use BrainGames\Games\BrainProgression;
use BrainGames\Games\BrainPrime;

function start(array $config, string $gameName, string $userName, string $greetingsMessage): void
{
    echo $greetingsMessage . PHP_EOL;

    $hasWon = run($config, $gameName);

    $template = $hasWon ? $config['system_messages']['has_won'] : $config['system_messages']['has_lost'];

    echo sprintf($template, $userName) . PHP_EOL;
}

function run(array $config, string $gameName): bool
{
    $correctAnswersCountGoal = 3;
    $currentCorrectAnswersCount = 0;

    while ($currentCorrectAnswersCount < $correctAnswersCountGoal) {
        $answer = handleQuestion($config, $gameName);

        $currentCorrectAnswersCount = $answer['is_correct'] ? $currentCorrectAnswersCount + 1 : 0;

        echo $answer['output_text'] . PHP_EOL;

        if (!$answer['is_correct']) {
            break;
        }
    }

    return $correctAnswersCountGoal === $currentCorrectAnswersCount;
}

function handleQuestion(array $config, string $gameName): array
{
    [$question, $correctAnswer] = getQuestion($config, $gameName);

    echo sprintf($config['messages']['question'], $question) . PHP_EOL;

    $answer = readline($config['messages']['answer']);

    return $answer === $correctAnswer
        ? ['is_correct' => true, 'output_text' => $config['messages']['correct']]
        : ['is_correct' => false, 'output_text' => sprintf($config['messages']['incorrect'], $answer, $correctAnswer)];
}

function getQuestion(array $config, string $gameName): array
{
    return match ($gameName) {
        $config['games']['brain_calc']        => BrainCalc\generateCalculationValue(),
        $config['games']['brain_gcd']         => BrainGcd\generateGcdValue(),
        $config['games']['brain_progression'] => BrainProgression\generateProgressionValue(),
        $config['games']['brain_prime']       => BrainPrime\generatePrimeValue($config),
        default                               => BrainEven\generateEvenOrOddValue($config),
    };
}
