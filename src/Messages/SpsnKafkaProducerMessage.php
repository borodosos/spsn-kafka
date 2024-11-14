<?php

namespace Spsn\Kafka\Messages;

use Junges\Kafka\Message\Message;

class SpsnKafkaProducerMessage extends Message {
    public function __construct(mixed $body, array $headers = null, string $key = null) {
        parent::__construct(
            headers: $headers,
            body: json_encode($body),
            key: $key
        );
    }
}