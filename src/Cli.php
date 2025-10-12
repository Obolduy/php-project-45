<?php

namespace BrainGames\Cli;

function greetings(): string
{
    echo "Welcome to the Brain Games!" . PHP_EOL;

    $name = handleUserName();

    echo "Hello, $name!" . PHP_EOL;

    return $name;
}

function handleUserName(): string
{
    return readline("May I have your name? ");
}
