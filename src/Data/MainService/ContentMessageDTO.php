<?php

namespace Spsn\Kafka\Data\MainService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;
use Spsn\Kafka\Constants\MessageTypes\SpsnTdSrv\SpsnTdMessageTypes;

class ContentMessageDTO extends Data {
    private string $message_type = SpsnTdMessageTypes::CONTENT;

    public function __construct(
        public string $workflow_id,
        public string $document_id,
        public string $sender_operator_id,
        public string $recipient_operator_id,
        public string $sender_id,
        public string $recipient_id,
        public DocumentContentDTO $document,
    ) {
    }

    public static function from(mixed ...$payloads): static
    {
        try {
            return parent::from(...$payloads);
        } catch (\Exception $e) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST));
        }
    }

    public function transform(null | TransformationContextFactory | TransformationContext $transformationContext = null): array {
        return [
            'message_id' => Str::uuid(),
            'workflow_id' => $this->workflow_id,
            'document_id' => $this->document_id,
            'message_type' => $this->message_type,
            'sender_operator' => [
                'id' => $this->sender_operator_id,
            ],
            'recipient_operator' => [
                'id' => $this->recipient_operator_id,
            ],
            'sender' => [
                'id' => $this->sender_id,
            ],
            'recipient' => [
                'id' => $this->recipient_id,
            ],
            'document' => $this->document,
        ];
    }
}