<?php

namespace Spsn\Kafka\Data\MainService;
use Spatie\LaravelData\Data;

class DocumentArtifactDTO extends Data {
    public function __construct(
        public string $type,
        public string $id,
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
