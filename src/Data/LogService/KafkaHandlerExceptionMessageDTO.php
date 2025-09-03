<?php

namespace Spsn\Kafka\Data\LogService;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;
use Spsn\Kafka\Events\SpsnKafkaMessageReceived;

class KafkaHandlerExceptionMessageDTO extends Data {
    public function __construct(
        public string $service_name,
        public array $kafka_message,
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
            'kafka_message' => $this->kafka_message,
            'message' => $this->message,
            'code' => $this->code,
            'trace' => $this->trace
        ];
    }
}
