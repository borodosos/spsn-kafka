<?php
namespace Spsn\Kafka\Messages;

use Carbon\Carbon;
use Junges\Kafka\Message\Message;
use Spsn\Kafka\Constants\SpsnAppServiceNames;
use Str;

class SpsnKafkaProducerMessage extends Message {
    public function __construct(
        string $messageType,
        mixed $message = null,
        ?string $forAppService = null,
        ?array $headers = null,
        ?string $key = null
    ) {
        parent::__construct(
            headers: $headers ?? ['header-key' => 'key', 'id' => Str::uuid(), 'app_service' => config('spsn_kafka.app_service_name')],
            body: match ($forAppService) {
                SpsnAppServiceNames::SPSN_IDOCS => $message,
                default                         => [
                    'type'      => $messageType,
                    'timestamp' => Carbon::now()->format('d.m.Y H:i:s'),
                    'payload'   => $message,
                ]
            },
            key: $key ?? 'key',
        );

    }
}
