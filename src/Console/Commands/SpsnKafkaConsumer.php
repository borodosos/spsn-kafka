<?php

namespace Spsn\Kafka\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Contracts\KafkaMessage;
use Junges\Kafka\Facades\Kafka;
use Spsn\Kafka\Actions\MakeLogAction;
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
        $consumer = Kafka::consumer([config('spsn_kafka.consumer.topic')])
            ->withBrokers(config('kafka.brokers'))
            ->withOptions(config('spsn_kafka.consumer.options'))
            ->withConsumerGroupId(1)
            ->withAutoCommit()
            ->withHandler(function (KafkaMessage $message) {
                $this->info('Kafka message: ' . $message->getBody() . json_encode($message->getHeaders()));
                MakeLogAction::execute('success', $message->getBody(), $message->getHeaders());
                event(new SpsnKafkaMessageReceived($message->getKey(), $message->getBody(), $message->getTopicName(), $message->getHeaders()));
            })
            ->build();

        $consumer->stopConsuming();

        $consumer->consume();
    }
}