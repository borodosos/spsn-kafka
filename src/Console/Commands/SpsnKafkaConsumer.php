<?php

namespace Spsn\Kafka\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Junges\Kafka\Contracts\KafkaMessage;
use Junges\Kafka\Facades\Kafka;
use Spsn\Kafka\Actions\SpsnLogKafkaMessageAction;
use Spsn\Kafka\Events\SpsnKafkaMessageReceived;

class SpsnKafkaConsumer extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spsn-kafka:consumer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume messages from Kafka topics';

    /**
     * Execute the console command.
     */
    public function handle() {
        $consumer = Kafka::consumer(config('spsn_kafka.topics'), null, config('kafka.brokers'))
            ->withOptions(config('spsn_kafka.consumer.options'))
            ->withHandler(function (KafkaMessage $message) {
                try {
                    event(new SpsnKafkaMessageReceived($message->getKey(), $message->getBody(), $message->getTopicName()));
                } catch (Exception $e) {
                    SpsnLogKafkaMessageAction::execute($e, 'error');
                }
            })
            ->build();

        $consumer->consume();
    }
}