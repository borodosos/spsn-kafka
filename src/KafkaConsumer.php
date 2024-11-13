<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Contracts\KafkaMessage;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class KafkaConsumer extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kafka-consumer';

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
        $consumer = Kafka::consumer(config('kafka_config.consumer.topics'), null, config('kafka.brokers'))
            ->withOptions(config('kafka_config.consumer.options'))
            ->withHandler(function (KafkaMessage $message) {
                event(new Message($message->getBody()));
                $this->info('Kafka message received: ' . $message->getBody());
            })
            ->build();

        $consumer->consume();
    }
}