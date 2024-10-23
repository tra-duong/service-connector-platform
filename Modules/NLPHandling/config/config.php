<?php

return [
    'name' => 'NLPHandling',
    'model' => [
        'chatgpt' => [
            'secret' => env('CHATGPT_API_SECRET'),
        ],
    ],
];
