<?php

namespace Spsn\Kafka\Models;

use Illuminate\Database\Eloquent\Model;

class SpsnLogKafkaIncomingMessage extends Model {
    protected $fillable = [
        'from_app_service',
        'status',
        'body',
    ];

    public function scopeWhereAppService($query, $appService) {
        return $query->where('from_app_service', $appService);
    }
}