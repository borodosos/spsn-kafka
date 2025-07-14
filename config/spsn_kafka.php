<?php

use Spsn\Kafka\Constants\SpsnAppServiceNames;

return [
    'app_service_name' => env('APP_SERVICE_NAME', null),
    'consumer' => [
        'topic' => '', // -- Editable
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
    'topics' => match (env('APP_ENV')) {
        'production' => [
            SpsnAppServiceNames::SPSN_TD => 'prod-td-srv',
            SpsnAppServiceNames::SPSN_NOTIFY => 'prod-notif-srv',
            SpsnAppServiceNames::SPSN_BILLING => 'prod-billing-srv',
            SpsnAppServiceNames::SPSN_TICKETS => 'prod-tiket-srv',
            SpsnAppServiceNames::SPSN_IDOCS => 'prod-idocs-srv',
            SpsnAppServiceNames::SPSN_STT => 'prod-stt-srv',
            SpsnAppServiceNames::SPSN_LOG => 'prod-log-srv',
            SpsnAppServiceNames::SPSN_STORAGE => 'prod-storage-srv',
        ],
        'stage' => [
            SpsnAppServiceNames::SPSN_TD => 'stage-td-srv',
            SpsnAppServiceNames::SPSN_NOTIFY => 'stage-notif-srv',
            SpsnAppServiceNames::SPSN_BILLING => 'stage-billing-srv',
            SpsnAppServiceNames::SPSN_TICKETS => 'stage-tiket-srv',
            SpsnAppServiceNames::SPSN_IDOCS => 'stage-idocs-srv',
            SpsnAppServiceNames::SPSN_STT => 'stage-stt-srv',
            SpsnAppServiceNames::SPSN_LOG => 'stage-log-srv',
            SpsnAppServiceNames::SPSN_STORAGE => 'stage-storage-srv',
        ],
        'dev_custom' => [
            SpsnAppServiceNames::SPSN_TD => 'dever-td-srv',
            SpsnAppServiceNames::SPSN_NOTIFY => 'dever-notif-srv',
            SpsnAppServiceNames::SPSN_BILLING => 'dever-billing-srv',
            SpsnAppServiceNames::SPSN_TICKETS => 'dever-tiket-srv',
            SpsnAppServiceNames::SPSN_IDOCS => 'dever-idocs-srv',
            SpsnAppServiceNames::SPSN_STT => 'dever-stt-srv',
            SpsnAppServiceNames::SPSN_LOG => 'dever-log-srv',
            SpsnAppServiceNames::SPSN_STORAGE => 'dever-storage-srv',
        ],
        default => [
            SpsnAppServiceNames::SPSN_TD => 'dev-td-srv',
            SpsnAppServiceNames::SPSN_NOTIFY => 'dev-notif-srv',
            SpsnAppServiceNames::SPSN_BILLING => 'dev-billing-srv',
            SpsnAppServiceNames::SPSN_TICKETS => 'dev-tiket-srv',
            SpsnAppServiceNames::SPSN_IDOCS => 'dev-idocs-srv',
            SpsnAppServiceNames::SPSN_STT => 'dev-stt-srv',
            SpsnAppServiceNames::SPSN_LOG => 'dev-log-srv',
            SpsnAppServiceNames::SPSN_STORAGE => 'dev-storage-srv',
        ]
    },
    'usernames' => match (env('APP_ENV')) {
        'production' => [
            SpsnAppServiceNames::SPSN_TD => 'kuser-td-prod-td-srv',
            SpsnAppServiceNames::SPSN_NOTIFY => 'kuser-td-prod-notif-srv',
            SpsnAppServiceNames::SPSN_BILLING => 'kuser-td-prod-billing-srv',
            SpsnAppServiceNames::SPSN_TICKETS => 'kuser-td-prod-tiket-srv',
            SpsnAppServiceNames::SPSN_IDOCS => 'kuser-td-prod-idocs-srv',
            SpsnAppServiceNames::SPSN_STT => 'kuser-td-prod-stt-srv',
            SpsnAppServiceNames::SPSN_LOG => 'kuser-td-prod-log-srv',
            SpsnAppServiceNames::SPSN_STORAGE => 'kuser-td-prod-storage-srv',
        ],
        'stage' => [
            SpsnAppServiceNames::SPSN_TD => 'kuser-td-stage-td-srv',
            SpsnAppServiceNames::SPSN_NOTIFY => 'kuser-td-stage-notif-srv',
            SpsnAppServiceNames::SPSN_BILLING => 'kuser-td-stage-billing-srv',
            SpsnAppServiceNames::SPSN_TICKETS => 'kuser-td-stage-tiket-srv',
            SpsnAppServiceNames::SPSN_IDOCS => 'kuser-td-stage-idocs-srv',
            SpsnAppServiceNames::SPSN_STT => 'kuser-td-stage-stt-srv',
            SpsnAppServiceNames::SPSN_LOG => 'kuser-td-stage-log-srv',
            SpsnAppServiceNames::SPSN_STORAGE => 'kuser-td-stage-storage-srv',
        ],
        default => [
            SpsnAppServiceNames::SPSN_TD => 'kuser-td-dev-td-srv',
            SpsnAppServiceNames::SPSN_NOTIFY => 'kuser-td-dev-notif-srv',
            SpsnAppServiceNames::SPSN_BILLING => 'kuser-td-dev-billing-srv',
            SpsnAppServiceNames::SPSN_TICKETS => 'kuser-td-dev-tiket-srv',
            SpsnAppServiceNames::SPSN_IDOCS => 'kuser-td-dev-idocs-srv',
            SpsnAppServiceNames::SPSN_STT => 'kuser-td-dev-stt-srv',
            SpsnAppServiceNames::SPSN_LOG => 'kuser-td-dev-log-srv',
            SpsnAppServiceNames::SPSN_STORAGE => 'kuser-td-dev-storage-srv',
        ]
    },
];