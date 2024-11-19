<?php
namespace Spsn\Kafka\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use Spsn\Kafka\Console\Commands\SpsnKafkaConsumer;
use Spsn\Kafka\Console\Commands\SpsnKafkaLogClear;
use Spsn\Kafka\Console\Commands\SpsnKafkaMakeListener;
use Spsn\Kafka\Constants\SpsnKafkaConsumerTopic;
use Spsn\Kafka\Constants\SpsnKafkaTopics;
use Spsn\Kafka\Constants\SpsnKafkaUsernames;

class SpsnKafkaProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->mergeConfigFrom(
            __DIR__ . "/../../config/spsn_kafka.php",
            "spsn_kafka"
        );

        $this->mergeConfigFrom(
            __DIR__ . "/../../config/spsn_services.php",
            "spsn_services"
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        $this->publishesConfiguration();
        SpsnKafkaTopics::register();
        SpsnKafkaUsernames::register();
        SpsnKafkaConsumerTopic::register();

        if ($this->app->runningInConsole()) {
            $this->commands([
                SpsnKafkaConsumer::class,
                SpsnKafkaMakeListener::class,
                SpsnKafkaLogClear::class,
            ]);

            $schedule = $this->app->make(Schedule::class);
            $schedule->command('spsn-kafka:log-clear')->monthly()->withoutOverlapping();
        }

    }

    private function publishesConfiguration(): void {
        $this->publishes([
            __DIR__ . "/../../config/spsn_kafka.php" => config_path('spsn_kafka.php'),
        ], 'spsn-kafka-config');

        $this->publishes([
            __DIR__ . "/../../config/spsn_services.php" => config_path('spsn_services.php'),
        ], 'spsn-services');

        $this->publishes([
            __DIR__ . '/../Database/Migrations/' => database_path('migrations'),
        ], 'spsn-kafka-migrations');
    }
}