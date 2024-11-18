<?php

namespace Spsn\Kafka\Constants;

class SpsnKafkaConsumerTopic {
    public static function register() {
        $serviceName = env('APP_SERVICE_NAME', null);

        if ($serviceName) {
            $topic = config('spsn_kafka.topics')[env('APP_SERVICE_NAME')];
            config()->set('spsn_kafka.consumer.topic', $topic);
        }
    }
}