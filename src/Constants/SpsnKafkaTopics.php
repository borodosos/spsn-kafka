<?php

namespace Spsn\Kafka\Constants;

class SpsnKafkaTopics {
    public static function register() {
        $topics = match (app()->env) {
            'production' => [
                SpsnAppServiceNames::SPSN_TD => 'stable-td-srv',
                SpsnAppServiceNames::SPSN_NOTIFY => 'stable-notif-srv',
                SpsnAppServiceNames::SPSN_BILLING => 'stable-billing-srv',
                SpsnAppServiceNames::SPSN_TIKETS => 'stable-tiket-srv',
                SpsnAppServiceNames::SPSN_IDOCS => 'stable-idocs-srv',
                SpsnAppServiceNames::SPSN_STT => 'stable-stt-srv',
                SpsnAppServiceNames::SPSN_LOG => 'stable-log-srv',
            ],
            'stage' => [
                SpsnAppServiceNames::SPSN_TD => 'stage-td-srv',
                SpsnAppServiceNames::SPSN_NOTIFY => 'stage-notif-srv',
                SpsnAppServiceNames::SPSN_BILLING => 'stage-billing-srv',
                SpsnAppServiceNames::SPSN_TIKETS => 'stage-tiket-srv',
                SpsnAppServiceNames::SPSN_IDOCS => 'stage-idocs-srv',
                SpsnAppServiceNames::SPSN_STT => 'stage-stt-srv',
                SpsnAppServiceNames::SPSN_LOG => 'stage-log-srv',
            ],
            default => [
                SpsnAppServiceNames::SPSN_TD => 'dev-td-srv',
                SpsnAppServiceNames::SPSN_NOTIFY => 'dev-notif-srv',
                SpsnAppServiceNames::SPSN_BILLING => 'dev-billing-srv',
                SpsnAppServiceNames::SPSN_TIKETS => 'dev-tiket-srv',
                SpsnAppServiceNames::SPSN_IDOCS => 'dev-idocs-srv',
                SpsnAppServiceNames::SPSN_STT => 'dev-stt-srv',
                SpsnAppServiceNames::SPSN_LOG => 'dev-log-srv',
            ]
        };

        config()->set('spsn_kafka.topics', $topics);
    }
}