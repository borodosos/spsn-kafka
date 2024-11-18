<?php

namespace Spsn\Kafka\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spsn\Kafka\Actions\MakeLogKafkaOutgoingMessageAction;

class SpsnKafkaProducerJob implements ShouldQueue {
    use Queueable;

    private $message;
    private $producer;
    private $appServiceName;

    /**
     * Create a new job instance.
     */
    public function __construct($message, $producer, $appServiceName) {
        $this->producer = $producer;
        $this->message = $message;
        $this->appServiceName = $appServiceName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $this->producer->withMessage($this->message)->send();
        $body = json_encode([
            'topic' => $this->message->getTopicName(),
            'key' => $this->message->getKey(),
            'body' => $this->message->getBody(),
            'headers' => $this->message->getHeaders(),
        ]);
        $messageId = $this->message->getHeaders()['id'];
        MakeLogKafkaOutgoingMessageAction::execute('success', $body, $this->appServiceName, $messageId);
    }

    public function failed($exception = null) {
        MakeLogKafkaOutgoingMessageAction::execute('error', json_encode($exception->getMessage()), $this->appServiceName);
    }
}