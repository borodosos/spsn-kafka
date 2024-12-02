<?php

namespace Spsn\Kafka\Actions;

use Spsn\Kafka\Models\SpsnLogKafkaOutgoingMessage;

class MakeLogKafkaOutgoingMessageAction
{
    public static function execute(string $status, string $body, string $appServiceName, string $messageId = null)
    {
        SpsnLogKafkaOutgoingMessage::create(['status' => $status, 'to_app_service' => $appServiceName, 'body' => $body, 'message_id' => $messageId]);
    }
}
