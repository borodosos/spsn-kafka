<?php
namespace Spsn\Kafka\Data\NotifyService;
use Spatie\LaravelData\Data;

class NotifyMessageDataDTO extends Data {

    public function __construct(
        public NotifyMessageRecipientDTO $recipient,
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
}