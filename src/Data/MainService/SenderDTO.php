<?php

namespace Spsn\Kafka\Data\MainService;
use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\Data;

class SenderDTO extends Data {
    public function __construct(
        public string $id,
        public string $country_code,
        public string $company,
        public string | null $inn,
        public string | null $kpp,
        public string | null $bin,
        public string $email,
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