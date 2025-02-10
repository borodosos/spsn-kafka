<?php

namespace Spsn\Kafka\Data\MainService;
use Spatie\LaravelData\Data;

class DocumentContentDTO extends Data {
    public function __construct(
        public bool $signature_required,
        public string $signature_type,
        public DocumentMetaDTO $meta,
        public array $country_codes,
        public ?string $message = null,
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