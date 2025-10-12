<?php

namespace BrainGames\Cli;

function greetings(array $config): string
{
    echo $config['system_messages']['init_greetings'] . PHP_EOL;

    $name = handleUserName($config);

    echo $config['system_messages']['user_greetings'] . PHP_EOL;

    return $name;
}

function handleUserName(array $config): string
{
    return readline($config['system_messages']['ask_for_user_name']);
}
