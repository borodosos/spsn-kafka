<?php

namespace Spsn\Kafka\Models;

use Illuminate\Database\Eloquent\Model;

class SpsnAppService extends Model {
    protected $fillable = ['name', 'repo_name'];

    protected $table = 'spsn_app_services';

    public function kafkaMessages() {
        return $this->hasMany(SpsnLogKafkaMessage::class);
    }
}