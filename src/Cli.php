<?php

namespace BrainGames\Cli;

function greet(): void
{
    echo 'Welcome to the Brain Games!' . PHP_EOL;
    $userName = (string) readline('May I have your name? ');
    echo sprintf("Hello, %s!", $userName) . PHP_EOL;
}
