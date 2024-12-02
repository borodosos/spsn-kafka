<?php

namespace Spsn\Kafka\Messages;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spsn\Kafka\Constants\SpsnMessageTemplates;
use Spsn\Kafka\Traits\HasValidation;

class SpsnKafkaMessageInvitation extends JsonResource {
    use HasValidation;

    /**
     * @param array $data
     */
    public function __construct(
        private array $data
    ) {}

    public function toArray(Request $request) {
        $this->validateInvitationMessage($this->data);

        return [
            "ext_message_id" => $this->data['ext_message_id'],
            "message_type" => SpsnMessageTemplates::INVITATION,
            "sender_operator" => [
                "id" => $this->data['sender_operator']['id'],
            ],
            "recipient_operator" => [
                "id" => $this->data['recipient_operator']['id'],
            ],
            "sender" => [
                "id" => $this->data['sender']['id'],
                "country_code" => $this->data['sender']['country_code'],
                "company" => $this->data['sender']['company'],
                "inn" => $this->data['sender']['inn'],
                "kpp" => $this->data['sender']['kpp'],
                "bin" => $this->data['sender']['bin'],
                "email" => $this->data['sender']['email'],
            ],
            "recipient" => [
                "id" => $this->data['recipient']['id'],
                "country_code" => $this->data['recipient']['country_code'],
                "company" => $this->data['recipient']['company'],
                "inn" => $this->data['recipient']['inn'],
                "kpp" => $this->data['recipient']['kpp'],
                "bin" => $this->data['recipient']['bin'],
                "email" => $this->data['recipient']['email'],
            ],
        ];
    }
}