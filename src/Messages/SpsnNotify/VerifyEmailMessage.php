<?php

namespace Spsn\Kafka\Messages\SpsnNotify;
use Spsn\Kafka\Messages\SpsnKafkaProducerMessage;

class VerifyEmailMessage extends SpsnKafkaProducerMessage {
    public function __construct(mixed $body, array $headers = null, string $key = null) {
        parent::__construct(
            headers: $headers,
            body: json_encode([
                'type' => 'verify_email',
                'data' => $body,
            ]),
            key: $key
        );
    }
}
