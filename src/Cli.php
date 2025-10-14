<?php

namespace BrainGames\Cli;

use function BrainGames\Engine\start;

function handle(array $config, ?callable $generateRound = null, ?string $gameDescription = null): void
{
    echo $config['system_messages']['init_greetings'] . PHP_EOL;

    $userName = handleUserName($config['system_messages']['ask_for_user_name']);

    printUserGreetings($config['system_messages']['user_greetings'], $userName);

    if ($generateRound !== null && $gameDescription !== null) {
        printGameDescription($gameDescription);

        start($config, $generateRound, $userName);
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

function printGameDescription(string $description): void
{
    echo $description . PHP_EOL;
}
