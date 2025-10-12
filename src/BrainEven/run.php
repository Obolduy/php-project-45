<?php

namespace BrainGames\BrainEven;

function execute(array $config, string $userName): void
{
    echo "Answer {$config['answers']['yes']} if the number is even, otherwise answer {$config['answers']['no']}\n";

    run($config);

    echo "Congratulations, $userName!" . PHP_EOL;
}

function run(array $config): void
{
    $correctAnswersCountGoal = 3;

    $currentCorrectAnswersCount = 0;

    while ($currentCorrectAnswersCount < $correctAnswersCountGoal) {
        $answer = handleQuestion($config);

        $currentCorrectAnswersCount = $answer['is_correct'] ? $currentCorrectAnswersCount + 1 : 0;

        echo $answer['output_text'] . PHP_EOL;
    }
}

function handleQuestion(array $config): array
{
    [$question, $correctAnswer] = generateEvenOrOddValue($config);

    echo "Question: $question" . PHP_EOL;

    $answer = readline("Your answer: ");

    return $answer === $correctAnswer
        ? ['is_correct' => true, 'output_text' => $config['messages']['correct']]
        : ['is_correct' => false, 'output_text' => sprintf($config['messages']['incorrect'], $answer, $correctAnswer)];
}
