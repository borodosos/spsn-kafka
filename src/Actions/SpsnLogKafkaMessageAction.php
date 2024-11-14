<?php

namespace Spsn\Kafka\Actions;

use Spsn\Kafka\Models\SpsnAppService;
use Spsn\Kafka\Models\SpsnLogKafkaMessage;

class SpsnLogKafkaMessageAction {
    static function execute(mixed $data, string $status) {
        $appServiceId = SpsnAppService::where('name', $data?->key)->first()?->id;

        SpsnLogKafkaMessage::create([
            'message_body' => $data,
            'spsn_app_service_id' => $appServiceId ?? null,
            'status' => $status,
        ]);
    }
}