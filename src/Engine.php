<?php

namespace BrainGames\Engine;

const ROUNDS_TO_WIN = 3;

function run(string $gameDescription, callable $generateRound): void
{
    $config = require __DIR__ . '/config/config.php';

    $userName = greetUser($config);

    echo $gameDescription . PHP_EOL;

    $hasWon = playGame($config, $generateRound);

    showResult($config, $userName, $hasWon);
}

function greetUser(array $config): string
{
    echo $config['system_messages']['init_greetings'] . PHP_EOL;
    $userName = (string) readline($config['system_messages']['ask_for_user_name']);
    echo sprintf($config['system_messages']['user_greetings'], $userName) . PHP_EOL;

    return $userName;
}

function playGame(array $config, callable $generateRound): bool
{
    for ($current = 0; $current < ROUNDS_TO_WIN; $current++) {
        $answer = handleQuestion($config, $generateRound);

        echo $answer['output_text'] . PHP_EOL;

        if (!$answer['is_correct']) {
            return false;
        }
    }

    return true;
}

function showResult(array $config, string $userName, bool $hasWon): void
{
    $template = $hasWon ? $config['system_messages']['has_won'] : $config['system_messages']['has_lost'];
    echo sprintf($template, $userName) . PHP_EOL;
}

function handleQuestion(array $config, callable $generateRound): array
{
    [$question, $correctAnswer] = $generateRound();

    printQuestion($config['messages']['question'], $question);

    $answer = getAnswer($config['messages']['answer']);

    return handleAnswer($answer, $correctAnswer, $config);
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
