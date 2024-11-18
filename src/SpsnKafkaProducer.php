<?php

namespace Spsn\Kafka;

use Junges\Kafka\Facades\Kafka;
use Spsn\Kafka\Jobs\SpsnKafkaProducerJob;
use Spsn\Kafka\Messages\SpsnKafkaProducerMessage;

class SpsnKafkaProducer {
    private $producer;
    private $appServiceName;

    public function __construct(string $appServiceName) {
        $this->appServiceName = $appServiceName;
        $topic = config('spsn_kafka.topics')[$appServiceName];
        $username = config('spsn_kafka.usernames')[$appServiceName];

        $this->producer = Kafka::publish(config('kafka.brokers'))
            ->withConfigOptions(config('spsn_kafka.producer.options'))
            ->withConfigOption('sasl.username', $username)
            ->onTopic($topic);
    }
    public function sendMessage(SpsnKafkaProducerMessage $message) {
        SpsnKafkaProducerJob::dispatch($message, $this->producer, $this->appServiceName)->onQueue('kafka_queue');
        return $message->getHeaders()['id'];
    }
}