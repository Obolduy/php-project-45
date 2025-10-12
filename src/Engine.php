<?php

namespace BrainGames\Engine;

use BrainGames\Games\BrainEven;
use BrainGames\Games\BrainCalc;
use BrainGames\Games\BrainGcd;
use BrainGames\Games\BrainProgression;
use BrainGames\Games\BrainPrime;

require_once __DIR__ . '/../src/Games/BrainEven/logic.php';
require_once __DIR__ . '/../src/Games/BrainCalc/logic.php';
require_once __DIR__ . '/../src/Games/BrainGcd/logic.php';
require_once __DIR__ . '/../src/Games/BrainProgression/logic.php';
require_once __DIR__ . '/../src/Games/BrainPrime/logic.php';

function start(array $config, string $gameName, string $userName, string $greetingsMessage): void
{
    echo $greetingsMessage . PHP_EOL;

    run($config, $gameName, $userName);

    echo "Congratulations, $userName!" . PHP_EOL;
}

function run(array $config, string $gameName, string $userName): void
{
    $correctAnswersCountGoal = 3;
    $currentCorrectAnswersCount = 0;

    while ($currentCorrectAnswersCount < $correctAnswersCountGoal) {
        $answer = handleQuestion($config, $gameName);

        $currentCorrectAnswersCount = $answer['is_correct'] ? $currentCorrectAnswersCount + 1 : 0;

        echo $answer['output_text'] . PHP_EOL;

        $additionalQuestionAnswerText = getAdditionalQuestionAnswerText(
            $config,
            $answer['is_correct'],
            $userName
        );

        if ($additionalQuestionAnswerText) {
            echo $additionalQuestionAnswerText . PHP_EOL;
        }
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
        $config['games']['brain_calc']        => BrainCalc\generateCalculationValue(),
        $config['games']['brain_gcd']         => BrainGcd\generateGcdValue(),
        $config['games']['brain_progression'] => BrainProgression\generateProgressionValue(),
        $config['games']['brain_prime']       => BrainPrime\generatePrimeValue($config),
        default                               => BrainEven\generateEvenOrOddValue($config),
    };
}

function getAdditionalQuestionAnswerText(array $config, bool $isCorrect, string $userName): ?string
{
    $correction = $isCorrect ? 'correct' : 'incorrect';

    $text = $config['additional_question_answer_text'][$correction] ?? null;

    return $text ? sprintf($text, $userName) : null;
}
