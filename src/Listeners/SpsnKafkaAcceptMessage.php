<?php

namespace Spsn\Kafka\Listeners;

use Spsn\Kafka\Events\SpsnKafkaMessageReceived;
use Spsn\Kafka\Models\SpsnLogKafkaMessage;

class SpsnKafkaAcceptMessage {
    /**
     * Create the event listener.
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SpsnKafkaMessageReceived $event): void {
        SpsnLogKafkaMessage::create([
            'message_body' => $event->body,
            'spsn_app_service_id' => $event->key,
        ]);
    }
}