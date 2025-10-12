<?php

return [
    'games' => [
        'brain_even'        => 'brain-even',
        'brain_calc'        => 'brain-calc',
        'brain_gcd'         => 'brain-gcd',
        'brain_progression' => 'brain-progression',
        'brain_prime'       => 'brain-prime',
        'default'           => 'brain-even',
    ],
    'answers' => [
        'yes' => 'yes',
        'no'  => 'no',
    ],
    'messages' => [
        'welcome'   => 'Welcome to the Brain Games!',
        'correct'   => 'Correct!',
        'incorrect' => "\"%s\" is wrong answer ;(. Correct answer was \"%s\"",
        'question'  => "Question: \"%s\"",
        'answer'    => "Your answer: ",
    ],
    'system_messages' => [
        'init_greetings'    => 'Welcome to the Brain Games!',
        'ask_for_user_name' => 'May I have your name? ',
        'user_greetings'    => "Hello, %s!",
        'has_won'           => "Congratulations, %s!",
        'has_lost'          => "Let's try again, %s",
    ],
    'games_info' => [
        'brain-even'        => "Answer \"%s\" if the number is even, otherwise answer \"%s\".",
        'brain-calc'        => 'What is the result of the expression?',
        'brain-gcd'         => 'Find the greatest common divisor of given numbers.',
        'brain-progression' => 'What number is missing in the progression?',
        'brain-prime'       => "Answer \"%s\" if the number is prime. Otherwise answer \"%s\".",
    ],
];
