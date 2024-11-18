<?php

return [
    'app_service_name' => env('APP_SERVICE_NAME', null),
    'consumer' => [
        'options' => [
            'security.protocol' => config('kafka.securityProtocol'),
            'sasl.mechanism' => config('kafka.sasl.mechanisms'),
            'sasl.username' => config('kafka.sasl.username'),
            'sasl.password' => config('kafka.sasl.password'),
            'ssl.ca.location' => config('kafka.ssl.ca_location'),
            'auto.offset.reset' => 'earliest',
        ],
    ],
    'producer' => [
        'options' => [
            'security.protocol' => config('kafka.securityProtocol'),
            'sasl.mechanism' => config('kafka.sasl.mechanisms'),
            'sasl.password' => config('kafka.sasl.password'),
            'ssl.ca.location' => config('kafka.ssl.ca_location'),
        ],
    ],
];