<?php

namespace Spsn\Kafka\Models;

use Illuminate\Database\Eloquent\Model;

class SpsnLogKafkaMessage extends Model {
    protected $fillable = ['message_body', 'spsn_app_service_id'];

    protected $table = 'spsn_log_kafka_messages';

    public function appService() {
        return $this->belongsTo(SpsnAppService::class);
    }
}