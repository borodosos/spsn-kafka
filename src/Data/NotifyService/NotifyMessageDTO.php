<?php

namespace Spsn\Kafka\Data\NotifyService;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;

class NotifyMessageDTO extends Data {

    public function __construct(
        public string $notify_type,
        public string $address,
        public mixed $data,
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
            'notify_type' => $this->notify_type,
            'address' => $this->address,
            'data' => $this->data,
        ];
    }
}
