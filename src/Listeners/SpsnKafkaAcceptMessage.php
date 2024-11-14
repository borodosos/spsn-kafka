<?php

namespace Spsn\Kafka\Listeners;

use Spsn\Kafka\Actions\SpsnLogKafkaMessageAction;
use Spsn\Kafka\Events\SpsnKafkaMessageReceived;

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
        SpsnLogKafkaMessageAction::execute($event, 'success');
    }
}