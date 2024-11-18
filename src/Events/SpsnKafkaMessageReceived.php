<?php

namespace Spsn\Kafka\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SpsnKafkaMessageReceived {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $key;
    public $body;
    public $topicName;
    public $headers;

    /**
     * Create a new event instance.
     */
    public function __construct($key, $body, $topicName, $headers) {
        $this->key = $key;
        $this->body = $body;
        $this->topicName = $topicName;
        $this->headers = $headers;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}