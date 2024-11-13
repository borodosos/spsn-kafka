<?php

namespace Spsn\Kafka\Messages;

use Junges\Kafka\Message\Message;
use Spsn\Kafka\Constants\SpsnServicesNames;

class SpsnKafkaProducerMessage extends Message {
    public function __construct(mixed $body, array $headers = null, string $key = null) {
        parent::__construct(
            headers: $headers ?? ['header-key' => 'header-value'],
            body: json_encode($body),
            key: $key ?? SpsnServicesNames::SPSN_TD
        );
    }
}