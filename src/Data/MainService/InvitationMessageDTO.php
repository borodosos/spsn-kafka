<?php

namespace Spsn\Kafka\Data\MainService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;
use Spsn\Kafka\Constants\MessageTypes\SpsnTdSrv\SpsnTdMessageTypes;

class InvitationMessageDTO extends Data {
    private string $message_type = SpsnTdMessageTypes::INVITATION;

    public function __construct(
        public ?string $message_id = null,
        public SenderOperatorDTO $sender_operator,
        public RecipientOperatorDTO $recipient_operator,
        public SenderDTO $sender,
        public RecipientDTO $recipient,

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
            'message_id' => $this->message_id ?? Str::uuid(),
            "message_type" => $this->message_type,
            "sender" => [
                "id" => $this->sender->id,
                "country_code" => $this->sender->country_code,
                "company" => $this->sender->company,
                "inn" => $this->sender->inn,
                "kpp" => $this->sender->kpp,
                "bin" => $this->sender->bin,
                "email" => $this->sender->email,
            ],
            "recipient" => [
                "id" => $this->recipient->id,
                "country_code" => $this->recipient->country_code,
                "company" => $this->recipient->company,
                "inn" => $this->recipient->inn,
                "kpp" => $this->recipient->kpp,
                "bin" => $this->recipient->bin,
                "email" => $this->recipient->email,
            ],
        ];
    }
}
