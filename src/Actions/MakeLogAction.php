<?php

namespace Spsn\Kafka\Actions;

use Spsn\Kafka\Models\SpsnLogKafkaIncomingMessage;

class MakeLogAction {
    public static function execute(string $status, string $body, array $headers) {
        $appServiceName = $headers['app_service'];
        SpsnLogKafkaIncomingMessage::create(['status' => $status, 'from_app_service' => $appServiceName, 'body' => $body]);
    }
}