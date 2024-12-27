<?php

namespace Spsn\Kafka\Data\MainService;
use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\Data;

class DocumentMetaDTO extends Data {
    public function __construct(
        public string $document_name,

        /** @var DocumentArtifactDTO[] */
        public array $artifacts,
    ) {
    }

    public static function from(mixed ...$payloads): static
    {
        try {
            return parent::from(...$payloads);
        } catch (\Exception $e) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json(['message' => $e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR));
        }
    }
}