<?php
namespace Spsn\Kafka\Data\NotifyService;
use Spatie\LaravelData\Data;

class NotifyMessageDataDTO extends Data {

    public function __construct(
        public string $email,
        public ?string $code,
        public string $user_id,
        public ?string $country_code,
        public ?string $sender_company = null,
        public ?bool $is_recipient_registered = null
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