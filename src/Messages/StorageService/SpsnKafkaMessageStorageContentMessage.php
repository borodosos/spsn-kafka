<?php

namespace Spsn\Kafka\Messages\StorageService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spsn\Kafka\Constants\SpsnMessageTemplates;
use Spsn\Kafka\Traits\HasValidation;

class SpsnKafkaMessageStorageContentMessage extends JsonResource {
    use HasValidation;

    /**
     * @param array $data
     */
    public function __construct(
        private array $data
    ) {}

    /**
     * @throws \Exception
     */
    public function toArray(Request $request): array
    {
        $this->validateStorageContentMessage($this->data);

        return [
            'message_id' => $this->data['message_id'],
            "workflow_id" => $this->data['workflow_id'],
            "document_id" => $this->data['document_id'],
            "message_type" => SpsnMessageTemplates::CONTENT,
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
            "document" => [
                "signature_required" => $this->data['document']['signature_required'],
                "signature_type" => $this->data['document']['signature_type'],
                "meta" => [
                    "document_name" => $this->data['document']['meta']['document_name'],
                    "artifacts" => $this->data['document']['meta']['artifacts'],
                    "message" => $this->data['document']['meta']['message'],
                ],
                "content" => $this->data['document']['content'],
                "country_codes" => $this->data['document']['country_codes'],
            ],
        ];
    }
}
