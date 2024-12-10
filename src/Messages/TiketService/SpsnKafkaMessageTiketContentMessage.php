<?php

namespace Spsn\Kafka\Messages\TicketService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spsn\Kafka\Traits\HasValidation;

class SpsnKafkaMessageTicketContentMessage extends JsonResource {
    use HasValidation;

    /**
     * @param array $data
     */
    public function __construct(
        private array $data
    ) {}

    public function toArray(Request $request) {
        $this->validateTicketContentMessage($this->data);

        return [
            'notify_type' => $this->data['notify_type'],
            'address' => $this->data['address'],
            'data' => $this->data['data'],
        ];
    }
}
