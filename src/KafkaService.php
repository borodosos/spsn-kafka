<?php

namespace App\Services;

use App\Constants\AppServiceConstants;
use App\Constants\SpsnNotifyMessageTypes;
use App\Kafka\KafkaProducer;
use App\Kafka\Messages\SpsnNotify\VerifyEmailMessage;

class KafkaService {
    public function __construct() {
    }

    public function sendMessageToSpsnNotify(string $messageType, string $email) {
        $producer = new KafkaProducer(AppServiceConstants::SPSN_NOTIFY);
        $message = match ($messageType) {
            SpsnNotifyMessageTypes::VERIFY_EMAIL => new VerifyEmailMessage([
                'email' => $email,
            ]),
        };

        $producer->sendMessage($message);
    }
}
