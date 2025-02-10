<?php

namespace Spsn\Kafka\Data\LogService;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;

class LogMessageDTO extends Data {

    public function __construct(
        public string $service_name,
        public string | int $log_service_id,
        public string $log_type,
        public mixed $data,
        public string $timestamp,
        public ?bool $log_service_start_service_message = false,
        public ?bool $end_service_message = true,
    ) {
    }

    public static function from(mixed ...$payloads): static
    {
        try {
            return parent::from(...$payloads);
        } catch (\Exception $e) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST));
        }
    }

    public function transform(null | TransformationContextFactory | TransformationContext $transformationContext = null): array {
        return [
            'log_service_start_service_message' => $this->log_service_start_service_message,
            'end_service_message' => $this->end_service_message,
            'service_name' => $this->service_name,
            'log_service_id' => $this->log_service_id,
            'log_type' => $this->log_type,
            'data' => $this->data,
            'timestamp' => $this->timestamp,
        ];
    }
}
