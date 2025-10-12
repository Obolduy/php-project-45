<?php

namespace BrainGames\Cli;

function greetings()
{
    echo "Welcome to the Brain Games!\n";

    $name = readline("May I have your name?");

    echo "Hello, $name!\n";
}
