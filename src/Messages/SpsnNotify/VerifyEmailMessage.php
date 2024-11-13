<?php

namespace App\Kafka\Messages\SpsnNotify;

use App\Kafka\Messages\KafkaProducerMessage;

class VerifyEmailMessage extends KafkaProducerMessage {
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
