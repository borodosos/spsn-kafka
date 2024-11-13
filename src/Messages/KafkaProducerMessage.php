<?php

namespace App\Kafka\Messages;

use App\Constants\AppServiceConstants;
use Junges\Kafka\Message\Message;

class KafkaProducerMessage extends Message {
    public function __construct(mixed $body, array $headers = null, string $key = null) {
        parent::__construct(
            headers: $headers ?? ['header-key' => 'header-value'],
            body: json_encode($body),
            key: $key ?? AppServiceConstants::SPSN_TD
        );
    }
}