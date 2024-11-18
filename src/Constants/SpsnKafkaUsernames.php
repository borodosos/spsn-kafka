<?php

namespace Spsn\Kafka\Constants;

class SpsnKafkaUsernames {
    public static function register() {
        $usernames = match (app()->env) {
            'production' => [
                SpsnAppServiceNames::SPSN_TD => 'kuser-td-stable-td-srv',
                SpsnAppServiceNames::SPSN_NOTIFY => 'kuser-td-stable-notif-srv',
                SpsnAppServiceNames::SPSN_BILLING => 'kuser-td-stable-billing-srv',
                SpsnAppServiceNames::SPSN_TIKET => 'kuser-td-stable-tiket-srv',
                SpsnAppServiceNames::SPSN_IDOCS => 'kuser-td-stable-idocs-srv',
                SpsnAppServiceNames::SPSN_STT => 'kuser-td-stable-stt-srv',
                SpsnAppServiceNames::SPSN_LOG => 'kuser-td-stable-log-srv',
            ],
            'stage' => [
                SpsnAppServiceNames::SPSN_TD => 'kuser-td-stage-td-srv',
                SpsnAppServiceNames::SPSN_NOTIFY => 'kuser-td-stage-notif-srv',
                SpsnAppServiceNames::SPSN_BILLING => 'kuser-td-stage-billing-srv',
                SpsnAppServiceNames::SPSN_TIKET => 'kuser-td-stage-tiket-srv',
                SpsnAppServiceNames::SPSN_IDOCS => 'kuser-td-stage-idocs-srv',
                SpsnAppServiceNames::SPSN_STT => 'kuser-td-stage-stt-srv',
                SpsnAppServiceNames::SPSN_LOG => 'kuser-td-stage-log-srv',
            ],
            default => [
                SpsnAppServiceNames::SPSN_TD => 'kuser-td-dev-td-srv',
                SpsnAppServiceNames::SPSN_NOTIFY => 'kuser-td-dev-notif-srv',
                SpsnAppServiceNames::SPSN_BILLING => 'kuser-td-dev-billing-srv',
                SpsnAppServiceNames::SPSN_TIKET => 'kuser-td-dev-tiket-srv',
                SpsnAppServiceNames::SPSN_IDOCS => 'kuser-td-dev-idocs-srv',
                SpsnAppServiceNames::SPSN_STT => 'kuser-td-dev-stt-srv',
                SpsnAppServiceNames::SPSN_LOG => 'kuser-td-dev-log-srv',
            ]
        };

        config()->set('spsn_kafka.usernames', $usernames);
    }
}
