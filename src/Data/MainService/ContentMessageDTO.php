<?php
namespace Spsn\Kafka\Data\MainService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;
use Spsn\Kafka\Constants\MessageTypes\SpsnTdSrv\SpsnTdMessageTypes;

class ContentMessageDTO extends Data {
    public string $message_type = SpsnTdMessageTypes::CONTENT;

    public function __construct(
        public string $workflow_id,
        public string $document_id,
        public SenderOperatorDTO $sender_operator,
        public RecipientOperatorDTO $recipient_operator,
        public ContentSenderDTO $sender,
        public ContentRecipientDTO $recipient,
        public DocumentContentDTO $document,
        public string | int | null $message_id = null,
    ) {
    }

    public static function from(mixed ...$payloads): static
    {
        try {
            return parent::from(...$payloads);
        } catch (\Exception $e) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json(['message' => $e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR));
        }
    }

    public function transform(null | TransformationContextFactory | TransformationContext $transformationContext = null): array {
        return [
            'message_id'         => $this->message_id ?? Str::uuid(),
            'workflow_id'        => $this->workflow_id,
            'document_id'        => $this->document_id,
            'message_type'       => $this->message_type,
            'sender_operator'    => [
                'id' => $this->sender_operator->id,
            ],
            'recipient_operator' => [
                'id' => $this->recipient_operator->id,
            ],
            'sender'             => [
                'id' => $this->sender->id,
            ],
            'recipient'          => [
                'id' => $this->recipient->id,
            ],
            'document'           => $this->document,
        ];
    }
}
