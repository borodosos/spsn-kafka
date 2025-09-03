<?php

namespace Spsn\Kafka\Data\LogService;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;

class ExceptionMessageDTO extends Data {
    public function __construct(
        public string $service_name,
        public ?string $user_id = null,
        public ?string $request_url = null,
        public string $message,
        public int|string $code,
        public array $trace
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
            'user_id' => $this->user_id,
            'request_url' => $this->request_url,
            'message' => $this->message,
            'code' => $this->code,
            'trace' => $this->trace
        ];
    }
}
