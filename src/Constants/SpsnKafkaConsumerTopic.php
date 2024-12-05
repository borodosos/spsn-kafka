<?php

namespace Spsn\Kafka\Constants;

class SpsnKafkaConsumerTopic {
    public static function register() {
        if (config('spsn_kafka.app_service_name')) {
            if (!config('spsn_kafka.consumer.topic') || config('spsn_kafka.consumer.topic') === '') {
                $topic = config('spsn_kafka.topics')[env('APP_SERVICE_NAME')];
                config()->set('spsn_kafka.consumer.topic', $topic);
            }
        }
    }
}