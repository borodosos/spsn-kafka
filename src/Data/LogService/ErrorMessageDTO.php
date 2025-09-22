<?php

namespace Spsn\Kafka\Data\LogService;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;

class ErrorMessageDTO extends Data {

    public function __construct(
        public string $service_name,
        public string $message
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
            'service_name' => $this->service_name,
            'message' => $this->message
        ];
    }
}
