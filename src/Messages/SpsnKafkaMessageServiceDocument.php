<?php

namespace Spsn\Kafka\Messages;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spsn\Kafka\Constants\SpsnMessageTemplates;
use Spsn\Kafka\Traits\HasValidation;

class SpsnKafkaMessageServiceDocument extends JsonResource {

    use HasValidation;

    /**
     * @param mixed $data
     */
    public function __construct(
        private mixed $data
    ) {}

    public function toArray(Request $request) {
        $this->validateServiceDocumentMessage($this->data);

        return [
            "message_id" => $this->data['message_id'],
            "workflow_id" => $this->data['workflow_id'],
            "document_id" => $this->data['document_id'],
            "message_type" => SpsnMessageTemplates::SERVICE_DOCUMENT,
            "sender_operator" => [
                "id" => $this->data['sender_operator']['id'],
            ],
            "recipient_operator" => [
                "id" => $this->data['recipient_operator']['id'],

            ],
            "sender" => [
                "id" => $this->data['sender']['id'],
            ],
            "recipient" => [
                "id" => $this->data['recipient']['id'],
            ],
            "service_message" => [
                "code" => $this->data['service_message']['code'],
                "content" => $this->data['service_message']['content'],
                "payload" => $this->data['service_message']['payload'],
            ],
        ];
    }
}