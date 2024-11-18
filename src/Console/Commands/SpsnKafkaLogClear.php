<?php

namespace Spsn\Kafka\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spsn\Kafka\Models\SpsnLogKafkaIncomingMessage;
use Spsn\Kafka\Models\SpsnLogKafkaOutgoingMessage;

class SpsnKafkaLogClear extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spsn-kafka:log-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all logs of Kafka messages';

    /**
     * Execute the console command.
     */
    public function handle() {
        SpsnLogKafkaIncomingMessage::where('created_at', '<', Carbon::now()->subDays(65))->delete();
        SpsnLogKafkaOutgoingMessage::where('created_at', '<', Carbon::now()->subDays(65))->delete();
    }
}
