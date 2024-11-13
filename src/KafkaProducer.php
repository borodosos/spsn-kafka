<?php

namespace App\Kafka;

use App\Kafka\Messages\KafkaProducerMessage;
use Junges\Kafka\Facades\Kafka;

class KafkaProducer {
    private $producer;
    public function __construct(string $appServiceName) {
        $topic = config('kafka_config.topics')[$appServiceName];
        $this->producer = Kafka::publish(config('kafka.brokers'))
            ->withConfigOptions([
                'security.protocol' => config('kafka.securityProtocol'),
                'sasl.mechanism' => config('kafka.sasl.mechanisms'),
                'sasl.username' => config('kafka.sasl.username'),
                'sasl.password' => config('kafka.sasl.password'),
                'ssl.ca.location' => config('kafka.ssl.ca_location'),
            ])
            ->onTopic($topic);
    }

    public function sendMessage(KafkaProducerMessage $message) {
        $this->producer->withMessage($message)->send();
    }
}