<?php

namespace BrainGames\Engine;

const ROUNDS_TO_WIN = 3;

function start(array $config, callable $generateRound, string $userName): void
{
    $hasWon = run($config, $generateRound);

    $template = $hasWon ? $config['system_messages']['has_won'] : $config['system_messages']['has_lost'];

    echo sprintf($template, $userName) . PHP_EOL;
}

function run(array $config, callable $generateRound): bool
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
