<?php

return [
    'games' => [
        'brain_even' => 'brain-even',
        'brain_calc' => 'brain-calc',
        'default'    => 'brain-even',
    ],
    'answers' => [
        'yes' => 'yes',
        'no'  => 'no',
    ],
    'messages' => [
        'welcome'   => 'Welcome to the Brain Games!',
        'correct'   => 'Correct!',
        'incorrect' => "\"%s\" is wrong answer ;(. Correct answer was \"%s\""
    ],
    'system_messages' => [
        'init_greetings'    => 'Welcome to the Brain Games!',
        'ask_for_user_name' => 'May I have your name? ',
        'user_greetings'    => "Hello, %s!",
    ],
    'games_info' => [
        'brain-even' => "Answer \"%s\" if the number is even, otherwise answer \"%s\".",
        'brain-calc' => 'What is the result of the expression?',
    ],
];
