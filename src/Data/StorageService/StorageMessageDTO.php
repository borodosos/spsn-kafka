<?php

namespace Spsn\Kafka\Data\StorageService;
use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Support\Transformation\TransformationContextFactory;

class StorageMessageDTO extends Data {

    public function __construct(
        public string $document_content,
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
            'document_content' => $this->document_content,
        ];
    }
}