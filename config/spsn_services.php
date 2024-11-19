<?php

return [
    'main_service_url' => env('NOTIFICATION_SERVICE_URL', 'http://localhost:80'),
    'notification_service_url' => env('MAIN_SERVICE_URL', 'http://localhost:81'),
    'billing_service_url' => env('BILLING_SERVICE_URL', 'http://localhost:82'),
    'tikets_service_url' => env('TIKETS_SERVICE_URL', 'http://localhost:83'),
    'idocs_service_url' => env('IDOCS_SERVICE_URL', 'http://localhost:84'),
    'stt_service_url' => env('STT_SERVICE_URL', 'http://localhost:85'),
    'log_service_url' => env('LOG_SERVICE_URL', 'http://localhost:86'),
    'ca_service_url' => env('CA_SERVICE_URL', 'http://localhost:87'),
    'storage_service_url' => env('STORAGE_SERVICE_URL', 'http://localhost:88'),
];