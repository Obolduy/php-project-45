<?php

namespace BrainGames\Cli;

function greetings()
{
    echo "Welcome to the Brain Game!\n";

    $name = readline("May I have your name?\n");

    echo "Hello, $name!\n";
}