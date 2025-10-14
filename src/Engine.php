<?php

namespace BrainGames\Engine;

use function BrainGames\Games\BrainEven\generateEvenOrOddValue as generateEvenOrOdd;
use function BrainGames\Games\BrainCalc\generateCalculationValue as generateCalc;
use function BrainGames\Games\BrainGcd\generateGcdValue as generateGcd;
use function BrainGames\Games\BrainProgression\generateProgressionValue as generateProgression;
use function BrainGames\Games\BrainPrime\generatePrimeValue as generatePrime;

function start(array $config, string $gameName, string $userName): void
{
    $hasWon = run($config, $gameName);

    $template = $hasWon ? $config['system_messages']['has_won'] : $config['system_messages']['has_lost'];

    echo sprintf($template, $userName) . PHP_EOL;
}

function run(array $config, string $gameName): bool
{
    $goal = 3;
    $current = 0;

    while ($current < $goal) {
        $answer = handleQuestion($config, $gameName);

        $current = $answer['is_correct'] ? $current + 1 : 0;

        echo $answer['output_text'] . PHP_EOL;

        if (!$answer['is_correct']) {
            break;
        }
    }

    return $goal === $current;
}

function handleQuestion(array $config, string $gameName): array
{
    [$question, $correctAnswer] = getQuestion($config, $gameName);

    printQuestion($config['messages']['question'], $question);

    $answer = getAnswer($config['messages']['answer']);

    return handleAnswer($answer, $correctAnswer, $config);
}

function getQuestion(array $config, string $gameName): array
{
    return match ($gameName) {
        $config['games']['brain_calc']        => generateCalc(),
        $config['games']['brain_gcd']         => generateGcd(),
        $config['games']['brain_progression'] => generateProgression(),
        $config['games']['brain_prime']       => generatePrime($config),
        default                               => generateEvenOrOdd($config),
    };
}

function printQuestion(string $prefix, string $questionText): void
{
    echo sprintf($prefix, $questionText) . PHP_EOL;
}

function getAnswer(string $answerPrefix): string
{
    return (string) readline($answerPrefix);
}

function handleAnswer(string $answer, string $correctAnswer, array $config): array
{
    return $answer === $correctAnswer
        ? ['is_correct' => true, 'output_text' => $config['messages']['correct']]
        : ['is_correct' => false, 'output_text' => sprintf($config['messages']['incorrect'], $answer, $correctAnswer)];
}
