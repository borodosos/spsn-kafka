<?php

namespace Spsn\Kafka\Constants;

class SpsnTopics {
    public static function register() {
        $topics = match (app()->env) {
            'production' => [
                // SpsnServicesNames::SPSN_TD => 'stable-td-srv',
                SpsnServicesNames::SPSN_NOTIFY => 'stable-notif-srv',
                // SpsnServicesNames::SPSN_BILLING => 'stable-billing-srv',
                // SpsnServicesNames::SPSN_TIKETS => 'stable-tiket-srv',
                // SpsnServicesNames::SPSN_IDOCS => 'stable-idocs-srv',
                // SpsnServicesNames::SPSN_STT => 'stable-stt-srv',
                // SpsnServicesNames::SPSN_LOG => 'stable-log-srv',
            ],
            'stage' => [
                // SpsnServicesNames::SPSN_TD => 'stage-td-srv',
                SpsnServicesNames::SPSN_NOTIFY => 'stage-notif-srv',
                // SpsnServicesNames::SPSN_BILLING => 'stage-billing-srv',
                // SpsnServicesNames::SPSN_TIKETS => 'stage-tiket-srv',
                // SpsnServicesNames::SPSN_IDOCS => 'stage-idocs-srv',
                // SpsnServicesNames::SPSN_STT => 'stage-stt-srv',
                // SpsnServicesNames::SPSN_LOG => 'stage-log-srv',
            ],
            default => [
                // SpsnServicesNames::SPSN_TD => 'dev-td-srv',
                SpsnServicesNames::SPSN_NOTIFY => 'dev-notif-srv',
                // SpsnServicesNames::SPSN_BILLING => 'dev-billing-srv',
                // SpsnServicesNames::SPSN_TIKETS => 'dev-tiket-srv',
                // SpsnServicesNames::SPSN_IDOCS => 'dev-idocs-srv',
                // SpsnServicesNames::SPSN_STT => 'dev-stt-srv',
                // SpsnServicesNames::SPSN_LOG => 'dev-log-srv',
            ]
        };

        config()->set('spsn_kafka.topics', $topics);
    }
}