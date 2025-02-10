<?php
namespace Spsn\Kafka\Data\MainService;
use Spatie\LaravelData\Data;

class SenderDTO extends Data {
    public function __construct(
        public ?string $id,
        public ?string $country_code,
        public ?string $company,
        public ?string $inn,
        public ?string $kpp,
        public ?string $bin,
        public string $email,
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
