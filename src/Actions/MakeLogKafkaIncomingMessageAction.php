<?php

namespace Spsn\Kafka\Actions;

use Spsn\Kafka\Models\SpsnLogKafkaIncomingMessage;

class MakeLogKafkaIncomingMessageAction {
    public static function execute(string $status, string $body, array $headers = null, string $messageId = null) {
        if ($headers) {
            $appServiceName = $headers['app_service'];
            SpsnLogKafkaIncomingMessage::create(['status' => $status, 'from_app_service' => $appServiceName, 'body' => $body, 'message_id' => $messageId]);

        } else {
            SpsnLogKafkaIncomingMessage::create(['status' => $status, 'body' => $body, 'message_id' => $messageId]);
        }
    }
}
