<?php

return [
    'default' => env('BROADCAST_DRIVER', 'log'),

    'connections' => [
        'pusher' => [
            'driver' => 'pusher',
            'key' => env('VITE_PUSHER_APP_KEY'),
            'secret' => env('VITE_PUSHER_APP_SECRET'),
            'app_id' => env('VITE_PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('VITE_PUSHER_CLUSTER', 'mt1'),
                'useTLS' => true,
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],
    ],
];
