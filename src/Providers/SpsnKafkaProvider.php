<?php
namespace Spsn\Kafka\Providers;

use Illuminate\Support\ServiceProvider;
use Spsn\Kafka\Constants\SpsnTopics;

class SpsnKafkaProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->publishesConfiguration();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        SpsnTopics::register();
    }

    private function publishesConfiguration(): void {
        $this->publishes([
            __DIR__ . "/../../config/spsn_kafka.php" => config_path('spsn_kafka.php'),
        ], 'spsn-kafka-config');
    }
}