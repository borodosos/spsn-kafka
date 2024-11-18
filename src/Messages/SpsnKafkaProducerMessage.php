<?php

namespace Spsn\Kafka\Messages;

use Junges\Kafka\Message\Message;
use Str;

class SpsnKafkaProducerMessage extends Message {
    public function __construct(mixed $body, string $type, array $headers = null, string $key = null) {
        parent::__construct(
            headers: $headers ?? ['header-key' => 'key', 'id' => Str::uuid(), 'app_service' => config('spsn_kafka.app_service_name')],
            body: json_encode([
                'type' => $type,
                'body' => $body,
            ]),
            key: $key ?? 'key',
        );
    }
}