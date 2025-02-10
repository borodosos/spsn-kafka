<?php
namespace Spsn\Kafka\Data\MainService;
use Spatie\LaravelData\Data;

class ServiceMessageDTO extends Data {
    public function __construct(
        public string $code,
        public ?string $content,
        public ?string $payload = null
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
