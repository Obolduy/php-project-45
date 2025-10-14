<?php

namespace BrainGames\Cli;

use function BrainGames\Engine\start;

function handle(array $config, ?string $gameName = null): void
{
    echo $config['system_messages']['init_greetings'] . PHP_EOL;

    $userName = handleUserName($config['system_messages']['ask_for_user_name']);

    printUserGreetings($config['system_messages']['user_greetings'], $userName);

    if ($gameName) {
        printGameInfo($config, $gameName);

        start($config, $gameName, $userName);
    }
}

function handleUserName(string $text): string
{
    return (string) readline($text);
}

function printUserGreetings(string $text, string $name): void
{
    echo sprintf($text, $name) . PHP_EOL;
}

function printGameInfo(array $config, string $gameName): void
{
    echo sprintf(...getGameInfo($config, $gameName)) . PHP_EOL;
}

function getGameInfo(array $config, string $gameName): array
{
    $additionalText = match ($gameName) {
        $config['games']['brain_prime'], $config['games']['brain_even'] => [
            $config['answers']['yes'],
            $config['answers']['no']
        ],
        default => [],
    };

    return [$config['games_info'][$gameName], ...$additionalText];
}
