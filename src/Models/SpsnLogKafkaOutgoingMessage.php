<?php

namespace Spsn\Kafka\Models;

use Illuminate\Database\Eloquent\Model;

class SpsnLogKafkaOutgoingMessage extends Model {
    protected $fillable = [
        'to_app_service',
        'status',
        'body',
    ];

    public function scopeWhereAppService($query, $appService) {
        return $query->where('to_app_service', $appService);
    }
}