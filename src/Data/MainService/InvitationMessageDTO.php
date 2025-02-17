<?php
namespace Spsn\Kafka\Data\MainService;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;
use Spsn\Kafka\Constants\MessageTypes\SpsnTdSrv\SpsnTdMessageTypes;

class InvitationMessageDTO extends Data {
    public string $message_type = SpsnTdMessageTypes::INVITATION;

    public function __construct(
        public SenderOperatorDTO $sender_operator,
        public RecipientOperatorDTO $recipient_operator,
        public SenderDTO $sender,
        public RecipientDTO $recipient,
        public ServiceMessageDTO $service_message,
        public string | int | null $message_id = null,
        public string | int | null $workflow_id = null,
    ) {
    }

    public static function from(mixed ...$payloads): static
    {
        try {
            return parent::from(...$payloads);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function transform(null | TransformationContextFactory | TransformationContext $transformationContext = null): array {
        return [
            'workflow_id'        => $this->workflow_id,
            'message_id'         => $this->message_id ?? Str::uuid(),
            "message_type"       => $this->message_type,
            'sender_operator'    => [
                'id' => $this->sender_operator->id,
            ],
            'recipient_operator' => [
                'id' => $this->recipient_operator->id,
            ],
            "sender"             => [
                "id"           => $this->sender->id,
                "country_code" => $this->sender->country_code,
                "company"      => $this->sender->company,
                "inn"          => $this->sender->inn,
                "kpp"          => $this->sender->kpp,
                "bin"          => $this->sender->bin,
                "email"        => $this->sender->email,
            ],
            "recipient"          => [
                "id"           => $this->recipient->id,
                "country_code" => $this->recipient->country_code,
                "company"      => $this->recipient->company,
                "inn"          => $this->recipient->inn,
                "kpp"          => $this->recipient->kpp,
                "bin"          => $this->recipient->bin,
                "email"        => $this->recipient->email,
            ],
            "service_message"    => [
                "code"    => $this->service_message->code,
                "content" => $this->service_message->content,
                "payload" => $this->service_message->payload,
            ],
        ];
    }
}
