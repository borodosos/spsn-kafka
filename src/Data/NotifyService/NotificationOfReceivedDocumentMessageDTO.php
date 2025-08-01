<?php
namespace Spsn\Kafka\Data\NotifyService;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;
use Spsn\Kafka\Constants\MessageTypes\SpsnNotifySrv\SpsnNotifyMessageTypes;
use Spsn\Kafka\Constants\MessageTypes\SpsnTdSrv\SpsnTdMessageTypes;
use Spsn\Kafka\Data\MainService\ContentRecipientDTO;
use Spsn\Kafka\Data\MainService\ContentSenderDTO;
use Spsn\Kafka\Data\MainService\DocumentContentDTO;
use Spsn\Kafka\Data\MainService\RecipientDTO;
use Spsn\Kafka\Data\MainService\RecipientOperatorDTO;
use Spsn\Kafka\Data\MainService\SenderDTO;
use Spsn\Kafka\Data\MainService\SenderOperatorDTO;

class NotificationOfReceivedDocumentMessageDTO extends Data {
    public string $message_type = SpsnNotifyMessageTypes::NOTIFICATION_OF_RECEIVED_DOCUMENT;

    public function __construct(
        public SenderDTO $sender,
        public RecipientDTO $recipient,
        public DocumentContentDTO $document,
        public string | int | null $message_id = null,
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
            'message_id' => $this->message_id ?? Str::uuid(),
            'message_type' => $this->message_type,
            'sender' => [
                'id' => $this->sender->id,
                'inn' => $this->sender->inn,
                'kpp' => $this->sender->kpp,
                'company' => $this->sender->company,
            ],
            'recipient' => [
                'id' => $this->recipient->id,
                'inn' => $this->recipient->inn,
                'kpp' => $this->recipient->kpp,
                'company' => $this->recipient->company,
            ],
            'document' => $this->document,
        ];
    }
}