<?php

namespace Spsn\Kafka\Data;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;
use Spsn\Kafka\Constants\MessageTypes\SpsnTdSrv\SpsnTdMessageTypes;

class InvitationMessageDTO extends Data {
    private string $message_type = SpsnTdMessageTypes::INVITATION;

    public function __construct(
        public string $sender_operator_id,
        public string $recipient_operator_id,
        public string $sender_id,
        public string $sender_country_code,
        public string $sender_company,
        public string $sender_inn,
        public string $sender_kpp,
        public string $sender_bin,
        public string $sender_email,
        public string $recipient_id,
        public string $recipient_country_code,
        public string $recipient_company,
        public string $recipient_inn,
        public string $recipient_kpp,
        public string $recipient_bin,
        public string $recipient_email,
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
            "ext_message_id" => Str::uuid(),
            "message_type" => $this->message_type,
            "sender" => [
                "id" => $this->sender_id,
                "country_code" => $this->sender_country_code,
                "company" => $this->sender_company,
                "inn" => $this->sender_inn,
                "kpp" => $this->sender_kpp,
                "bin" => $this->sender_email,
                "email" => $this->sender_email,
            ],
            "recipient" => [
                "id" => $this->recipient_id,
                "country_code" => $this->recipient_country_code,
                "company" => $this->recipient_company,
                "inn" => $this->recipient_inn,
                "kpp" => $this->recipient_kpp,
                "bin" => $this->recipient_email,
                "email" => $this->recipient_email,
            ],
        ];
    }
}