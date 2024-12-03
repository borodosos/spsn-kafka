<?php

namespace Spsn\Kafka\Messages;

use Carbon\Carbon;
use Junges\Kafka\Message\Message;
use Spsn\Kafka\Messages\NotifyService\SpsnKafkaMessageNotifyMessage;
use Spsn\Kafka\Messages\TdService\SpsnKafkaMessageContent;
use Spsn\Kafka\Messages\TdService\SpsnKafkaMessageInvitation;
use Spsn\Kafka\Messages\TdService\SpsnKafkaMessageServiceDocument;
use Str;

class SpsnKafkaProducerMessage extends Message {
    public function __construct(
        string $messageType,
        SpsnKafkaMessageInvitation | SpsnKafkaMessageContent | SpsnKafkaMessageServiceDocument | SpsnKafkaMessageNotifyMessage | array $message = null,
        ?array $headers = null,
        ?string $key = null
    ) {
        parent::__construct(
            headers: $headers ?? ['header-key' => 'key', 'id' => Str::uuid(), 'app_service' => config('spsn_kafka.app_service_name')],
            body: json_encode([
                'type' => $messageType,
                'timestamp' => Carbon::now()->format('d.m.Y H:i:s'),
                'payload' => $message,
            ]),
            key: $key ?? 'key',
        );

    }
}
